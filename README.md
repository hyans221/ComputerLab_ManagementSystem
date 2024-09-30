# Computer Lab Management System

## Team Contributions

| Member                | Contribution (%) | Responsibilities                                              |
|-----------------------|------------------|---------------------------------------------------------------|
| **Huỳnh Huy Hùng**    | 33%              | Developed homepage, login, user roles, and permissions.       |
| **Nguyễn Thị Thu Thảo** | 33%              | Managed lab schedules, class management, and system testing.  |
| **Hà Văn Thy**        | 33%              | User management, computer lab, and maintenance functionalities.|

## System Access

- **[Login Here](https://nhom11php.000webhostapp.com/DoAn_QLyPMT_Nhom11/login.php)**

### User Credentials

- **Admin**: 
  - Username: `huyhung`
  - Password: `123`
- **Teacher**: 
  - Username: `hihun`
  - Password: `123`
  - Username: `vanthy`
  - Password: `123`
  - Username: `thuthao`
  - Password: `123`

## Key Features

### 1. Class and Schedule Management
- **Create New Classes**: Set up detailed information including class name, instructor, subject, and academic year.
- **Update Information**: Modify class details as needed, ensuring accurate and up-to-date records.
- **Class Filtering**: Filter classes by subject, grade level, or instructor for easy management.
- **View Class Information**: Access detailed class information quickly and easily.

### 2. Lab Management
- **Add New Labs**: Record lab details including room name, location, number of computers, and hardware/software specs.
- **Update Lab Details**: Make changes to lab information as necessary to maintain accuracy.
- **Lab Filtering**: Organize labs based on specific criteria like location, type, or capacity.
- **View Lab Details**: Quickly access information about each lab.

### 3. Computer Management
- **Add Computers**: Record detailed information about each computer, including hardware configuration, software, and operational status.
- **Update Computer Information**: Modify computer details as required to keep data current.
- **Categorize Computers**: Filter by computer type, configuration, or operating system for efficient management.
- **View Computer Information**: Access specific computer details swiftly.

### 4. User and Role Management
- **Admin and Faculty Roles**: Assign specific permissions to admins and faculty, restricting or granting access to various features.
- **Access Control**: Admins have full access, while teachers manage class and schedule-related functions.

### 5. Practice Schedule Management
- **Schedule Lab Sessions**: Plan detailed schedules for classes, including subjects, timing, assigned lab, and instructor.
- **Update Schedules**: Adjust schedules easily to reflect any changes in class or lab availability.
- **Schedule Filtering**: Organize schedules based on criteria like subject, class, or instructor.
- **View Schedule Details**: Easily view detailed practice schedules for all classes.

### 6. Reporting and Statistics
- **Lab Utilization Reports**: Generate reports on lab usage, tracking which classes are using which labs and when.
- **Computer Inventory Reports**: View detailed reports on the status and location of all computers across labs.

## System Diagrams

### Use Case Diagram
Illustrates how different users interact with the system.

![Use Case Diagram](https://github.com/hyans221/QLPMT_Project_Nhom11/assets/89960460/02b6a4e8-58eb-4a23-8dbc-1920c024d207)

### Activity Diagram
Shows the flow of activities within the system, from login to lab management.

![Activity Diagram](https://github.com/hyans221/QLPMT_Project_Nhom11/assets/89960460/6e79944b-c6e5-4e3d-8e9f-b486923bb2cf)

### BFD Diagram
Outlines the main functional blocks of the system and their relationships.

![BFD Diagram](https://github.com/hyans221/QLPMT_Project_Nhom11/assets/89960460/c95207d3-1b26-4b6f-a734-cc885e05f2c0)

## Technology Stack

- **Programming Languages**: PHP, JavaScript
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap, jQuery
- **Server Environment**: Apache on Linux
- **Operating System**: Windows

## System Quality Requirements

- **Simple Interface**: User-friendly design that requires minimal training.
- **Language**: Entire system is available in Vietnamese.
- **Performance**: Fast processing speeds with minimal load times.

## Functional Requirements

| Role      | Description                                                                                 |
|-----------|---------------------------------------------------------------------------------------------|
| **Admin** | Full access to all system functions, including adding, editing, and deleting information.   |
| **Faculty** | Manages lab schedules and classes, can view student and lab information, and manage bookings.|

## Future Enhancements

- **Remote Lab Management**: Add remote control features to manage computer settings directly from the admin interface.
- **Advanced Analytics**: Incorporate more detailed reporting and data analysis tools.
- **Mobile Accessibility**: Optimize the system for mobile use, allowing on-the-go management.
