# Drupal Encapsulation Example

This is a custom Drupal 10 module that demonstrates the **Object-Oriented Programming principle of Encapsulation** through a clean, practical example.

---

## 🧩 What This Module Does

This module encapsulates the logic of calculating a discounted price inside a custom **service**. It separates:

- 💼 **Business Logic** → in a service (`PriceCalculator`)
- ⚙️ **Configuration Settings** → via a Drupal config form
- 🌐 **Presentation** → through a controller route that renders the result

---

## 📦 Features

- Custom **service** that hides internal logic (encapsulation).
- Admin **configuration form** (`/admin/config/encapsulation_demo/settings`) to set:
  - Base price
  - Discount rate
- Controller route (`/encapsulation_demo/price`) that displays the final price based on config.
- Uses **dependency injection** and adheres to Drupal best practices.

---

## 🧠 Key Concepts

| Concept              | Applied Here                                   |
|----------------------|------------------------------------------------|
| Encapsulation         | Logic is hidden in the `PriceCalculator` class |
| Dependency Injection | Services are injected cleanly into the controller |
| Separation of Concerns | Config, logic, and rendering are separated     |

---

## 🚀 How to Use

1. Place the module inside `modules/custom/encapsulation_demo`.
2. Enable the module.
3. Go to `/admin/config/encapsulation_demo/settings` and set the base price and discount rate.
4. Visit `/encapsulation_demo/price` to see the final calculated price.

---

## 🛠 Example Output

> “Final price after discount: $85.00”

---

## ✅ Created by

Gretel Gutiérrez  
Full Stack Drupal Developer