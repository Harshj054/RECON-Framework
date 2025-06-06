domain=$1
wordlist_small="/mnt/d/HACKING/wordlist/SecLists/Discovery/DNS/shubs-stackoverflow.txt"
wordlist_big="/mnt/d/HACKING/wordlist/SecLists/Discovery/DNS/dns-Jhaddix.txt"
permute="/mnt/d/HACKING/wordlist/permutations_main.txt"


resolvers_small="/mnt/d/HACKING/configFiles/resolvers.txt"
resolvers_Big="/mnt/d/HACKING/configFiles/resolvers_B.txt"

git_tokens="/mnt/d/HACKING/configFiles/githubtokens.txt"

dir="/mnt/d/HACKING/script_n/Scripts"

rm target/done.txt

domain_enum(){

    mkdir -p target/$domain target/$domain/SQLI target/$domain/sources target/$domain/httpx target/$domain/recon target/$domain/recon/nuclei target/$domain/recon/wayback target/$domain/recon/gf target/$domain/recon/aquatone

    subfinder -d $domain -o target/$domain/sources/subfinder.txt                                                                                                           #Subfinfder
    assetfinder -subs-only $domain | tee target/$domain/sources/assetFind.txt                                                                                              #assetfinder
    amass enum -passive -d $domain -config /mnt/d/HACKING/configFiles/config.ini -rf $resolvers_Big -o target/$domain/sources/amass_passive.txt                     #amass
    github-subdomains -d $domain -t $git_tokens -o target/$domain/sources/git_sub.txt                                                                                                      #github-subdomains
    # crobat -s $domain > target/$domain/sources/crobat.txt

    shuffledns -d $domain -w $wordlist_small -r $resolvers_Big -o target/$domain/sources/shuffledns.txt                                                                    #shuffeldns


    export CHAOS_KEY=079c1f8e-bb20-40f7-a8b4-7efbe925b9a3                                                                               #chaos key
    chaos -d $domain -key 079c1f8e-bb20-40f7-a8b4-7efbe925b9a3 -o target/$domain/sources/chaos.txt                                             #Chaos

   
    gauplus --subs $domain  | unfurl domains | sort -u >> target/$domain/sources/gau_dom.txt

    waybackurls $domain | unfurl domains | sort -u >> target/$domain/sources/wayback_dom.txt

    curl "https://tls.bufferover.run/dns?q=.$domain" | jq -r .Results[] | cut -d ',' -f4 | grep -F ".$domain" | anew -q target/$domain/sources/buff1.txt
    curl "https://dns.bufferover.run/dns?q=.$domain" | jq -r '.FDNS_A'[],'.RDNS'[]  | cut -d ',' -f2 | grep -F ".$domain" | anew -q target/$domain/sources/buff2.txt
    curl -s https://dns.bufferover.run/dns?q=.$domain | jq -r .FDNS_A[] | sed -s 's/,/\n/g' | anew > target/$domain/sources/private_ip.txt

    curl -s --request GET --url "https://api.securitytrails.com/v1/domain/$domain/subdomains?apikey=cdQ5pHLvz7VMYXBWuX0QlhDmssztp9ID" | jq '.subdomains[]' | sed 's/\"//g' > target/$domain/sources/securityT_subs 2> /dev/null && sed "s/$/.target.xx.xx/" target/$domain/sources/securityT_subs | sed 's/ //g'

    ./mg_subs.sh $domain target/$domain/sources/securityT_subs

    cat target/$domain/sources/*.txt | sort -u > target/$domain/sources/all.txt

   

}
domain_enum


permutation_Resolution(){

    mkdir -p target/$domain target/$domain/sources/perm

    #gotator -sub target/$domain/sources/all.txt -perm $permute -depth 1 -numbers 10 -mindup -adv -md > target/$domain/sources/gotator.txt

    puredns -r $resolvers_Big resolve target/$domain/sources/all.txt --write target/$domain/sources/perm/puredns.txt

    dnsx -retry 3 -cname -l $dir/target/$domain/sources/perm/puredns.txt -o $dir/target/$domain/sources/perm/dnsx.txt

    cat target/$domain/sources/perm/*.txt | sort -u > target/$domain/domains.txt
}
permutation_Resolution

Unimap(){

    mkdir -p target/$domain/sources/port

    COMMON_PORTS_WEB="81,300,591,593,832,981,1010,1311,1099,2082,2095,2096,2480,3000,3128,3333,4243,4567,4711,4712,4993,5000,5104,5108,5280,5281,5601,5800,6543,7000,7001,7396,7474,8000,8001,8008,8014,8042,8060,8069,8080,8081,8083,8088,8090,8091,8095,8118,8123,8172,8181,8222,8243,8280,8281,8333,8337,8443,8500,8834,8880,8888,8983,9000,9001,9043,9060,9080,9090,9091,9200,9443,9502,9800,9981,10000,10250,11371,12443,15672,16080,17778,18091,18092,20720,32000,55440,55672"

    sudo unimap --fast-scan -f $dir/target/$domain/domains.txt --ports $COMMON_PORTS_WEB -q -k --url-output >> $dir/target/$domain/domains.txt

    #cat $dir/target/$domain/domains.txt | httpx -random-agent -status-code -silent -retries 2 -no-color | cut -d ' ' -f1 | tee $dir/target/$domain/sources/port/probed_common_ports.txt

}
Unimap

http_probe(){

    cat $dir/target/$domain/domains.txt | httpx -random-agent -status-code -silent -retries 2 -no-color | cut -d ' ' -f1 | tee target/$domain/recon/nabbu.txt
    cat $dir/target/$domain/domains.txt | httpx -o target/$domain/httpx/on_domains.txt  
    cat $dir/target/$domain/domain_subs.txt | httpx -o target/$domain/httpx/on_domain_subs.txt
    cat target/$domain/sources/all.txt | httpx -o target/$domain/httpx/on_all.txt

    cat target/$domain/httpx/*.txt | sort -u > target/$domain/httpx/ALL_HTTPX.txt
}
http_probe


parameter_FUZZING(){

   cat target/$domain/httpx/ALL_HTTPX.txt | xargs -n 1 -I {} python3 /home/harsh/Tools/ParamSpider/paramspider.py --domain {} --level high | urldedupe >> target/$domain/all_spiderparamters.txt
     
}
#parameter_FUZZING

aqua(){

    cat target/$domain/recon/nabbu.txt | aquatone -ports xlarge -out target/$domain/recon/aquatone

}
aqua

takeover(){

    subzy r --targets target/$domain/domains.txt > target/$domain/subzy_takeover.txt
}
takeover

sqli(){

    python3 /home/harsh/Tools/HBSQLI/hbsqli.py -l target/$domain/httpx/ALL_HTTPX.txt -H  /home/harsh/Tools/HBSQLI/headers.txt -p  /home/harsh/Tools/HBSQLI/payloads.txt -v > target/$domain/SQLI/output.txt
}
sqli

touch target/done.txt