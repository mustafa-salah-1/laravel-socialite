# Socialite Authentication App

A Laravel application with Socialite integration for Google and GitHub OAuth login and registration.
 
---

## ✨ Features 
* **Authentication Scaffolding:** Uses Laravel's built-in Livewire starter kit for registration, login, and profile management.
* **Social Authentication:** Seamless login and registration with **Google** and **GitHub**. 

---

## 🛠️ Installation & Setup 
Follow these steps to get the project up and running on your local machine.

### **1. Prerequisites** 
Make sure you have the following installed:
* PHP >= 8.2
* Laravel **11** or greater
* Node.js & npm
* A database server (e.g., MySQL, PostgreSQL, SQLite)

### **2. Clone the Repository** 
First, clone the project from GitHub:
```bash
git clone https://github.com/mustafa-salah-1/laravel-socialite.git
cd laravel-socialite

### **3. Setup file .env**

# Google Credentials 
To set up Google OAuth, first [create a project on Google Cloud Console](https://console.cloud.google.com/projectcreate).

GOOGLE_CLIENT_ID="your-google-client-id"
GOOGLE_CLIENT_SECRET="your-google-client-secret"

# GitHub Credentials 
To set up GitHub OAuth, first [create a new OAuth app on GitHub](https://github.com/settings/developers).

GITHUB_CLIENT_ID="your-github-client-id"
GITHUB_CLIENT_SECRET="your-github-client-secret"
