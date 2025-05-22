# 🕵️‍♂️ RECON-Framework

**RECON-Framework** is a lightweight and powerful web-based interface designed to simplify reconnaissance tasks during bug bounty hunting and penetration testing. Built using PHP, HTML, and CSS, this tool helps you manage your recon workflow efficiently by storing and organizing scans and outputs in a structured way.



Users can perform new recon scans, view previous results, and integrate multiple tools with ease — all through a simple and intuitive web dashboard. Whether you're a beginner in infosec or an experienced hunter, this framework helps keep your recon organized, accessible, and ready for analysis.




## 🎥 Demo Video

> Watch the framework in action:


https://github.com/user-attachments/assets/3a745b7b-1c23-4d5a-9da2-4b97c789dcba


## 🚀 Features

- 🔍 Start new recon scans directly from the UI
- 🗂️ Browse and view results from previous scans
- 🛠️ Tool output categorized per domain
- 💾 MySQL-backed for storing scan data and outputs
- 📁 Easy to expand and integrate new tools



## 📦 Folder Structure

```bash
RECON-Framework/
├── index.php            # Entry point - choose to view old scans or start a new one
├── scan.php             # Handles scanning logic
├── view.php             # Displays results of old scans
├── config/              # DB config and global settings
├── scans/               # Stores results of various tools
├── assets/              # CSS, images, JS files
└── README.md
```



## ⚙️ Installation

1. **Clone the Repository**
   
   ```bash
   git clone https://github.com/Harshj054/RECON-Framework.git
   cd RECON-Framework
   ```

2. **Set Up MySQL Database**
   
   - Import `database.sql` if available (or create manually)
   - Tables:
     - `scans` – Contains scan names and dates
     - `domains` – Domains under each scan
     - `tool_outputs` – Stores results from tools per domain

3. **Configure DB Connection**
   
   - Edit `config/db.php` with your MySQL credentials.

4. **Start PHP Server**
   
   ```bash
   php -S localhost:8080
   ```

5. Open [http://localhost:8080](http://localhost:8080) in your browser.


## 🧠 Usage

- Go to the homepage.
- Enter a domain to start a new scan.
- The framework will run selected recon tools and save output.
- View or revisit any scan at any time.



## 🛠️ Tools Integrated

- Subfinder
- Assetfinder
- Nmap
- Waybackurls
- Custom Bash Scripts



## 🤝 Contributing

Pull requests are welcome! If you want to add new tools or enhance the UI, feel free to fork the project and send a PR.



## 🙋‍♂️ Author

**Harsh Jain**  
[GitHub](https://github.com/Harshj054) • [LinkedIn](https://www.linkedin.com/in/harsh-jain-7648382b7/)

**Aryan Raina**  
[GitHub](https://github.com/aryanraina7) • [LinkedIn](https://www.linkedin.com/in/aryan-raina-5b545231b/)
