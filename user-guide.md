# Krishna Trust - User Guide & Functionality Documentation

## 1. Introduction
**What is the Krishna Trust Project?**
Krishna Trust is a comprehensive web application built for a charitable organization. It helps the trust manage its day-to-day activities efficiently while providing a transparent platform for the public to learn about their work and contribute.

**Who is this for?**
- **Public Users / Donors:** Can view the trust's work, read testimonials, see impact photos, and make online donations.
- **Administrators:** Can log into a secure backend to manage beneficiaries (Labharthis), record donations, notify past donors, track employee attendance, manage expenses, and generate detailed reports.

---

## 2. Public Website (For General Users)
The public website is open to everyone and does not require a login.

### Step-by-Step Process:
1. **Home Page:** 
   - Open the website URL. Here, you will see an overview of the trust's services, recent impact photos, and testimonials from people.
2. **Making a Donation:**
   - On the Home page, locate the **Donation Form**.
   - Fill in your details (Name, Mobile, Address, Amount, PAN, etc.).
   - Select the payment mode (Cash, Cheque, Online).
   - Submit the form to record your donation.
3. **Viewing Impacts (Gallery):**
   - Click on the **Impact** menu. You can view photos of the trust's charitable activities categorized by month.
4. **Contacting the Trust:**
   - Go to the **Contact** page.
   - Fill out the inquiry form with your message, and it will be sent directly to the administrators.

---

## 3. Admin Panel (For Administrators)
The Admin Panel is a secure area for managing the trust's operations.

### Step-by-Step Process:

#### A. Logging In & Dashboard
1. Go to the `/login` page.
2. Enter your Admin Email and Password, or **Sign in with Google** if your Google account has admin access.
3. Upon successful login, you will see the **Dashboard**, which displays a quick summary of Total Donations, Beneficiaries, and Uploaded Media.
4. **Language Preferences:** You can easily switch the portal language between English and Gujarati to suit your preference.

#### B. Beneficiary (Labharthi) Management
*Labharthis are the people receiving aid (like tiffin services) from the trust.*
1. **View:** Go to the **Labharthi** section to see a list of all beneficiaries.
2. **Add New:** Click "Add Labharthi". Fill in their personal details, Aadhaar number, area, and upload an image. A unique Labharthi Number (e.g., RJ0001) will be auto-generated.
3. **Edit/Delete:** Use the Action buttons next to any record to update details or remove them.
4. **Reorder:** Use the drag-and-drop feature to change the display position of beneficiaries.

#### C. Donation Management
1. Go to the **Donation** section to view all received donations.
2. **Add Manual Donation:** Click "Add Donation" to record cash or cheque donations received offline.
3. **Receipt Generation:** Click the receipt button next to a donation to generate a digital receipt in Gujarati.
4. **WhatsApp Sharing:** Click the WhatsApp icon to instantly send the donation receipt to the donor's mobile number.

#### D. Notify Past Donors
1. Navigate to the **Notify Donor** section.
2. The system intelligently lists donors who contributed in the previous years (1 or 2 years ago) during the current month but haven't donated yet this year.
3. **Mark as Done:** After sending them a reminder message (e.g. via WhatsApp), click "Mark as Notified" to remove them from the pending list.

#### E. Attendance Tracking
1. Navigate to the **Attendance** section.
2. You will see a list of active beneficiaries.
3. Mark their daily attendance as **Present**, **Absent**, or **Not Specified**. This helps in tracking the tiffin service distribution.

#### F. Employee Management
1. Go to the **Employee** section to manage staff details and salaries.
2. **Withdrawals:** You can record partial salary withdrawals made by employees during the month. The system will automatically calculate their remaining final salary.

#### G. Media Gallery (Content)
1. Go to the **Contents** section.
2. Upload new photos of recent charitable events. These photos will automatically appear on the public "Impact" page.

#### H. Expense Tracking
1. Go to the **Expense** section.
2. Record daily or monthly operational expenses to keep the trust's accounting up to date.

#### I. Monthly Reports
1. Navigate to **Monthly Reports**.
2. Select a module (Donations, Labharthi, Attendance, etc.) and choose a Month/Year.
3. Click to download a formatted **Excel Report** for your records.

#### J. Leaflet Map
1. Go to the **Map** section.
2. View an interactive map displaying the geographical locations of all beneficiaries, helping in route planning for services.

---

## 4. Suggestions for Document Improvement
To make this documentation even more user-friendly and easily understandable, consider the following enhancements:

1. **Include Visuals:** Add screenshots of the actual software interfaces (e.g., a screenshot of the Dashboard, Donation Form, and Notify Donor page) next to each step. Visuals reduce cognitive load significantly.
2. **Create Short GIF Tutorials:** For complex processes like "Reordering Labharthis" or "Generating and Sending a Receipt via WhatsApp", a 5-second GIF is much better than text.
3. **Provide a Glossary of Terms:** Clarify local terms used in the software (e.g., defining exactly what a "Labharthi" or "Tiffin service" means in the context of the app).
4. **Add an FAQ Section:** Address common issues such as "What do I do if I forgot my password?" or "How do I fix an incorrect donation entry?"
5. **In-App Tooltips:** Instead of forcing users to read a separate document, embed small info-icons (`?`) next to complex fields within the application itself.
