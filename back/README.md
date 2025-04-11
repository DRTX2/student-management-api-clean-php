This project is an advanced **Full Stack web application** implementing an **Academic Management System**, designed to showcase strong software engineering practices, including:

- ✅ **Clean Architecture**
- ✅ **SOLID principles**
- ✅ **Design patterns**
- ✅ **Layered and decoupled structure (Domain, Application, Infrastructure, Interface)**
- ✅ **Domain-Driven Design (DDD)**
- ✅ **Modern frontend (React/Vue) with a PHP REST API**
- ✅ **Error handling, validation, testing, and basic security**

---

## 🧠 What does this system do?

The system manages the core entities of an academic environment. It's designed as a solid base that could grow into a full Learning Management System (LMS). Main functionality includes:

### 🎓 Student Module (implemented)
- Create, read, update, and delete students
- Duplicate detection
- Lookup by national ID (DNI)
- MySQL persistence with PDO

---

### 💼 Proposed future modules:

1. **Teacher Management**
   - Full CRUD operations
   - Assignment to courses

2. **Course Management**
   - Subject CRUD
   - Linkage to teachers and students

3. **Enrollment System**
   - Students enrolling in multiple subjects
   - Validation of business rules

4. **Evaluation System**
   - Grade input and tracking
   - GPA calculations
   - Per-student/course reports

5. **Authentication & Roles (JWT)**
   - Admin / Teacher / Student roles
   - Role-based access control

6. **Interactive Dashboard (Frontend)**
   - Intuitive UI built with React or Vue
   - Consuming PHP RESTful API
   - Data visualization (using Chart.js)

---

## 🧱 Tech Stack

### Backend
- PHP 8.x
- Clean Architecture (4 layers: Domain, Application, Infrastructure, Interface)
- PDO (MySQL)
- PSR-4 Autoloading
- Composer

### Frontend
- React.js (with Vite)
- Axios (for HTTP requests)
- Bootstrap or Tailwind CSS (optional)
- Chart.js (for data charts)

### Development tools
- Git and GitHub
- PHPUnit (for future testing)
- Docker (optional)
- Postman (for API testing)

---

## 🎯 Goal

This project is not just a practice in PHP — it is a real demonstration of scalable, maintainable, and professional software architecture. It’s designed to be easily extended and adapted to new requirements. It can serve as the base for a complete academic platform or any large-scale CRUD system.
