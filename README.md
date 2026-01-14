This is a simple web page with filament admin panel,
is designed for a **single logistics company** that provides **vehicle delivery and transport services for other companies**.

The application helps the delivery company:
- Manage its **fleet of delivery vehicles**
- Track **logistics operations** for external client companies
- Create and manage **invoices per delivery**
- Maintain operational data in a centralized admin system

Flex Logictics is **not a marketplace** and does not handle payments or user roles.  
It is built for **internal use by one company** through a single admin panel.

The system is structured to scale in the future with features such as GPS tracking, reporting, and analytics.

## 🔄 Application Workflow

This section describes the general workflow of the Traksi application.

### 1️⃣ Create Truck
- First you create truck by add new 

### 2️⃣ Create Driver
-  create driver and select truck the you have already create

### 3️⃣ Assigning a route
- create route and select driver that will be driving that route

### 4️⃣ Create Company 
- You can create new company that you will be driving for 
- after createing company you can add cars that need to be transfer for that company
- 
### 5️⃣ Orders
- here you can see all you orders(cars)
- you can create new cars from the orders resource
- and also you can assigned driver for each cars

### 6️⃣ Invoice
- select the company
- pick the cars (where you previous aassigned drivers in the order table)
- select driver and route
- fill the other fields save,
- and in the invoice talbe you can print your invoice PDF
  
### 7️⃣ Planned GPS Integration
- GPS tracking will be added in a future version
- Vehicles will report live location data
- Route history and analytics will be available

  
## 🚀 Installation & Setup

###  Clone the repository
```bash
git clone https://github.com/your-username/traksi.git
cd traksi

### Install frontend dependencies

npm install
npm run dev

### Database Setup

php artisan:migrate fresh --seed

### Start the server

to enter filament admin panel
/admin    
Email address*
admin@gmail.com

password
12345678


