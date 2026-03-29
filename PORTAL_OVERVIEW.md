# Trust Management Portal — Complete Feature Guide

> A comprehensive digital management system built for charitable trusts to manage beneficiaries, donations, employees, and daily operations — all from one centralized platform.

---

## Table of Contents

1. [Overview](#overview)
2. [Technology Stack](#technology-stack)
3. [Public Website](#public-website)
4. [Admin Panel](#admin-panel)
   - [Dashboard](#dashboard)
   - [Labharthi (Beneficiary) Management](#labharthi-beneficiary-management)
   - [Attendance Tracking](#attendance-tracking)
   - [Donation Management](#donation-management)
   - [Expense Management](#expense-management)
   - [Employee Management](#employee-management)
   - [Service Management](#service-management)
   - [Testimonial Management](#testimonial-management)
   - [Gallery / Content Management](#gallery--content-management)
   - [Contact Submissions](#contact-submissions)
   - [Monthly Reports](#monthly-reports)
   - [Location Map](#location-map)
5. [Key Highlights](#key-highlights)

---

## Overview

This portal is a full-featured **Trust Management System** designed to digitize and streamline the operations of a charitable trust. It provides a **public-facing website** for donors and visitors, and a **secure admin panel** for trust administrators to manage every aspect of the organization.

Built on the **Laravel framework**, the portal is robust, secure, and fully bilingual — supporting both **English** and **Gujarati** languages.

---

## Technology Stack

| Layer | Technology |
|-------|-----------|
| Backend Framework | Laravel 9 (PHP 8) |
| Database | MySQL |
| Frontend | Bootstrap 5, Blade Templates |
| Charts | Chart.js |
| Maps | Leaflet.js |
| Authentication | Email/Password + Google OAuth |
| File Export | Excel (Maatwebsite) |
| Image Processing | Compression & Optimization |
| Languages | English & Gujarati |

---

## Public Website

The public website is the face of the trust — accessible to all visitors, donors, and supporters.

---

### Home Page

The homepage introduces the trust with featured gallery, services, and a quick donation section.

<!-- IMAGE: Screenshot of the full homepage (hero section, services, gallery, testimonials) -->
> **[ Screenshot: Homepage ]**

**Features:**
- Hero/banner section with trust introduction
- 4 latest gallery photos from trust activities
- Featured services offered by the trust
- Testimonials from beneficiaries and donors
- Quick-access donation form

---

### About Page

Describes the trust's mission, vision, and real-time impact statistics pulled directly from the database.

<!-- IMAGE: Screenshot of About page with stats like total labharthis, years of service, etc. -->
> **[ Screenshot: About Page ]**

**Features:**
- Organization history and values
- Live count of total beneficiaries served

---

### Impact / Gallery Page

Shows the trust's activities and impact through photos, grouped by month and year.

<!-- IMAGE: Screenshot of Impact/Gallery page showing grid of photos grouped by month -->
> **[ Screenshot: Impact / Gallery Page ]**

**Features:**
- All activity photos organized by month & year
- Visual timeline of trust's work

---

### Contact Page

A public contact form that allows any visitor to reach out to the trust.

<!-- IMAGE: Screenshot of Contact page with the form -->
> **[ Screenshot: Contact Page ]**

**Features:**
- Fields: Name, Email, Mobile, Subject, Message
- Form validation (10-digit mobile, valid email)
- All submissions saved and viewable in admin panel

---

### Online Donation

Donors can submit donations directly through the public website.

<!-- IMAGE: Screenshot of Donation form on the website -->
> **[ Screenshot: Public Donation Form ]**

**Features:**
- Donor info: Name, Mobile, Address, Email, PAN
- Donation amount, date, and purpose
- Payment modes: Cash, Cheque (with bank details), Online (with transaction ID)
- Auto-generated receipt number

---

### Language Switcher

The entire portal — both public and admin — supports switching between **English** and **Gujarati** with one click.

<!-- IMAGE: Screenshot showing the language switcher button in the nav bar -->
> **[ Screenshot: Language Switcher (EN / GU) ]**

---

## Admin Panel

The admin panel is a secure, role-based interface accessible only to authorized administrators.

---

### Login

<!-- IMAGE: Screenshot of the Admin Login page with email/password form and Google button -->
> **[ Screenshot: Admin Login Page ]**

**Features:**
- Email + Password login
- "Continue with Google" (Google OAuth)
- Rate-limited: 5 attempts per minute
- Admin role verification on login

---

### Dashboard

The dashboard gives administrators an at-a-glance view of the trust's status.

<!-- IMAGE: Screenshot of full Dashboard with KPI cards, charts, and recent records tables -->
> **[ Screenshot: Admin Dashboard — Full View ]**

#### KPI Summary Cards

<!-- IMAGE: Close-up of the 6 KPI cards (Total Contents, Donations, Labharthis, Donation Amount, Expense Amount, Employees) -->
> **[ Screenshot: Dashboard KPI Cards ]**

| Card | What It Shows |
|------|--------------|
| Total Contents | Number of gallery/activity images uploaded |
| Total Donations | Total number of donation records |
| Total Labharthis | Number of registered beneficiaries |
| Total Donation Amount | Sum of all donations received (₹) |
| Total Expense Amount | Sum of all expenses recorded (₹) |
| Total Employees | Number of active staff members |

#### Monthly Donation Chart

<!-- IMAGE: Screenshot of the bar/line chart showing monthly donations for the current year -->
> **[ Screenshot: Monthly Donation Chart ]**

- Visual bar/line chart showing donation amounts month by month
- Current year overview at a glance

#### Donation by Payment Mode (Pie Chart)

<!-- IMAGE: Screenshot of the doughnut/pie chart for Cash vs Cheque vs Online -->
> **[ Screenshot: Payment Mode Distribution Chart ]**

- Doughnut chart breaking down donations by: **Cash**, **Cheque**, **Online**

#### Recent Records Tables

<!-- IMAGE: Screenshot of the Recent Donations and Recent Labharthis tables on the dashboard -->
> **[ Screenshot: Recent Donations & Labharthis Tables ]**

- Last 5 donations with donor name, amount, payment mode, and date
- Last 5 registered labharthis

---

### Labharthi (Beneficiary) Management

The most critical module — manages all beneficiaries receiving services from the trust.

<!-- IMAGE: Screenshot of Labharthi list page showing the table with all entries, search bar, and action buttons -->
> **[ Screenshot: Labharthi List Page ]**

#### Add / Edit Labharthi

<!-- IMAGE: Screenshot of the Labharthi Create/Edit form showing all fields -->
> **[ Screenshot: Add New Labharthi Form ]**

**Information Captured:**

| Category | Fields |
|----------|--------|
| Personal | Full Name, Mobile Number, Address |
| Identity | Aadhar Number (12-digit, unique), Identification Marks |
| Background | Native Place, Caste, Sub-Caste |
| Financial | Work Status, Income Source, Property Details |
| Trust Details | Category (Vidhva / Vidhur / Rejected / Other), Labharthi Number, Position, Status |
| Tiffin Service | Start Date, End Date, Reason for start/stop |
| Relations | Relative information |
| Comments | Internal notes by trust staff |
| Location | GPS Latitude/Longitude for map display |

**Key Features:**
- Auto-generated **labharthi number** per area
- **Drag-and-drop position** management to set display order
- **Search** by name, mobile, Aadhar, tiffin date
- **Soft delete** — records are never permanently lost
- **Excel export** with complete beneficiary data
- Pagination (10 per page)

---

### Attendance Tracking

Track daily attendance for active labharthis receiving tiffin or other daily services.

<!-- IMAGE: Screenshot of Attendance page showing list of labharthis with attendance marking options -->
> **[ Screenshot: Attendance Tracking Page ]**

**Features:**
- Shows only **active labharthis** (status = active)
- Ordered by position for easy sequential marking
- **Search** by name, position, mobile, or address
- Mark each labharthi as present or absent for any date
- **Excel export** with attendance summaries and totals

---

### Donation Management

A complete record of every donation received by the trust.

<!-- IMAGE: Screenshot of Donation list page with the table, search bar, and Export button -->
> **[ Screenshot: Donation List Page ]**

#### Add / Edit Donation

<!-- IMAGE: Screenshot of Donation Create form showing all fields including cheque/online payment section -->
> **[ Screenshot: Add Donation Form ]**

**Fields Recorded:**

| Category | Fields |
|----------|--------|
| Receipt | Receipt Number (auto-formatted, 6-digit) |
| Donor | Full Name, Mobile (+91 auto-format), Address |
| Donation | Date, Amount, Purpose/Category, Notes |
| Tax | PAN Number (Indian PAN format validated) |
| Payment | Mode: Cash / Cheque / Online |
| Cheque | Bank Name, Cheque Number, Cheque Date |
| Online | Transaction ID, Transaction Date |

**Key Features:**
- **Conditional form fields** — cheque/online fields appear based on payment mode
- **Search** by receipt number, donor name, or mobile
- **Soft delete** — safe deletion with restore capability
- **Excel export** with full donation details
- Pagination with customizable items per page

---

### Expense Management

Track all outgoing expenses of the trust.

<!-- IMAGE: Screenshot of Expense list page showing the table of expenses -->
> **[ Screenshot: Expense List Page ]**

#### Add / Edit Expense

<!-- IMAGE: Screenshot of Expense Create/Edit form -->
> **[ Screenshot: Add Expense Form ]**

**Fields:**
- Date of expense
- Amount
- Purpose/Category
- Additional notes/comments

**Features:**
- **Search** by purpose, notes, or date
- **Soft delete** support
- Dashboard shows **total expense amount**
- Included in monthly reports

---

### Employee Management

Manage all staff and volunteers working with the trust.

<!-- IMAGE: Screenshot of Employee list page with profile cards or table view -->
> **[ Screenshot: Employee List Page ]**

#### Add / Edit Employee

<!-- IMAGE: Screenshot of Employee Create/Edit form showing all fields and image upload -->
> **[ Screenshot: Add Employee Form ]**

**Fields:**
- Name, Mobile, Email
- Aadhar Number
- Address
- Salary
- Status (Active/Inactive)
- Profile Photo (with automatic compression)

#### Employee Withdrawal Tracking

<!-- IMAGE: Screenshot of the Employee Withdrawal form or history view -->
> **[ Screenshot: Employee Withdrawal Record ]**

- Record salary withdrawals per employee
- Track withdrawal date and amount
- Included in monthly reports

**Key Features:**
- Image upload with auto-compression
- **Search** by name, address, mobile, Aadhar, email, or salary
- **Soft delete** support
- Pagination (8 per page)

---

### Service Management

Manage the services/programs offered by the trust, displayed on the public website.

<!-- IMAGE: Screenshot of Service list page showing services with images and status -->
> **[ Screenshot: Service List Page ]**

#### Add / Edit Service

<!-- IMAGE: Screenshot of Service Create/Edit form with bilingual fields and image upload -->
> **[ Screenshot: Add Service Form — Bilingual Fields ]**

**Fields (Bilingual):**
- Title in English & Gujarati
- Description in English & Gujarati
- Service image (max 2MB, auto-compressed)
- Status (Show / Hide on website)

**Features:**
- Bilingual content management
- Status toggle to show/hide on public website
- Image compression and optimization
- Cached on homepage for performance

---

### Testimonial Management

Manage reviews and testimonials from beneficiaries or donors shown on the website.

<!-- IMAGE: Screenshot of Testimonial list page with profile pictures and text snippets -->
> **[ Screenshot: Testimonial List Page ]**

#### Add / Edit Testimonial

<!-- IMAGE: Screenshot of Testimonial Create/Edit form with bilingual fields -->
> **[ Screenshot: Add Testimonial Form ]**

**Fields (Bilingual):**
- Name in English & Gujarati
- Post/Title in English & Gujarati
- Testimonial description in English & Gujarati
- Profile photo
- Status (Show / Hide on website)

**Features:**
- Full bilingual testimonial content
- Profile image upload
- Search by name, post, or description
- Status-based visibility control

---

### Gallery / Content Management

Manage photos and media from trust activities shown in the public gallery.

<!-- IMAGE: Screenshot of Content/Gallery list page with photo grid and upload dates -->
> **[ Screenshot: Gallery Management Page ]**

#### Upload Photo

<!-- IMAGE: Screenshot of Content upload form with image picker and date field -->
> **[ Screenshot: Upload Gallery Photo Form ]**

**Fields:**
- Photo (max 2MB, auto-compressed)
- Upload/Activity date

**Features:**
- Photos displayed on homepage (latest 4) and Impact page (all, grouped by month)
- Automatic image compression
- Soft delete support
- Ordered by newest first

---

### Contact Submissions

View all messages submitted through the public contact form.

<!-- IMAGE: Screenshot of Contact list page showing submitted messages from visitors -->
> **[ Screenshot: Contact Submissions Page ]**

**Information Captured:**
- Visitor Name, Email, Mobile
- Subject, Message

**Features:**
- Read-only view (submissions from public)
- All entries included in monthly reports

---

### Monthly Reports

Generate and export data reports for any specific month and year.

<!-- IMAGE: Screenshot of Monthly Report index page with module selection and month/year dropdowns -->
> **[ Screenshot: Monthly Reports Page ]**

**Available Reports:**

| Report | Data Exported |
|--------|--------------|
| Donation Report | All donations for selected month |
| Labharthi Report | All beneficiary records |
| Attendance Report | Attendance with totals per person |
| Expense Report | All expenses for selected month |
| Contact Report | Contact form submissions |
| Employee Withdrawal Report | Salary withdrawals for selected month |

**Features:**
- Month and year dropdowns (only months with actual data are shown)
- One-click **Excel export** for each report
- Clean, organized data for auditing and accounting

<!-- IMAGE: Screenshot of a Sample Excel export opened (Donation or Labharthi sheet) -->
> **[ Screenshot: Sample Excel Export ]**

---

### Location Map

Visualize the geographic distribution of all registered labharthis on an interactive map.

<!-- IMAGE: Screenshot of the Leaflet.js map showing pin markers for labharthi locations -->
> **[ Screenshot: Labharthi Location Map ]**

**Features:**
- Interactive **Leaflet.js** map
- Pin markers for each labharthi with GPS coordinates
- Click marker to see beneficiary name
- Gives a quick overview of service coverage area

---

### Change Password

<!-- IMAGE: Screenshot of Change Password form in admin panel -->
> **[ Screenshot: Change Password Page ]**

- Secure password update with current password verification
- Form validation for new password

---

## Key Highlights

### All-in-One Trust Management

Everything a trust needs — from donor records to daily attendance — in a single, unified platform.

### Bilingual Interface

The entire portal (admin + public) works in both **English** and **Gujarati**, making it accessible to local staff and stakeholders.

<!-- IMAGE: Side-by-side screenshot of same page in English and Gujarati -->
> **[ Screenshot: English vs Gujarati Interface Comparison ]**

### Excel Exports for Every Module

Every major module supports **one-click Excel export** — making data sharing, auditing, and accounting simple and paperless.

<!-- IMAGE: Screenshot showing multiple Excel export buttons across different pages -->
> **[ Screenshot: Excel Export Buttons Across Modules ]**

### Secure & Role-Based Access

- Only authenticated **admin users** can access the panel
- Google OAuth for modern, password-free login
- Rate-limited login to prevent brute-force attacks
- All sensitive data protected

### Soft Delete — Data Safety

Records are never permanently deleted. Deleted entries are archived with a timestamp and can be restored, ensuring data integrity and auditability.

### Smart Search & Filter

Every list page has a **live search** feature allowing staff to quickly find any record by name, mobile, Aadhar, date, or other relevant fields.

<!-- IMAGE: Screenshot showing search bar in use on Labharthi or Donation page -->
> **[ Screenshot: Search Feature in Action ]**

### Image Optimization

All uploaded images (gallery, services, employee photos, testimonials) are automatically **compressed** before storage — keeping the system fast and storage-efficient.

### Interactive Analytics Dashboard

Real-time KPI cards and interactive charts give trust leadership a clear financial and operational overview at all times.

---

*For inquiries or to request a demo of this system, please contact the development team.*
