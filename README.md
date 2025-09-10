<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>V.Tharun kumar Reddy| Internship Portfolio</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: "Segoe UI", sans-serif; background: #f8f9fa; color: #333; }
    header { background: linear-gradient(90deg,#4e54c8,#8f94fb); color: white; padding: 40px 20px; text-align: center; }
    header h1 { font-size: 2.5rem; margin-bottom: 10px; }
    header p { font-size: 1.2rem; }
    nav { display: flex; justify-content: center; background: #222; }
    nav a { color: white; padding: 15px 20px; text-decoration: none; transition: 0.3s; }
    nav a:hover { background: #444; border-radius: 5px; }
    .container { max-width: 1100px; margin: 30px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); }
    section { display: none; animation: fadeIn 0.5s; }
    section.active { display: block; }
    h2 { margin-bottom: 15px; color: #4e54c8; }
    p { margin-bottom: 10px; line-height: 1.6; }
    @keyframes fadeIn { from {opacity:0;} to {opacity:1;} }

    .hero { text-align: center; padding: 40px; }
    .hero h2 { font-size: 2rem; }
    .hero button { padding: 10px 20px; border: none; border-radius: 6px; background: #4e54c8; color: white; cursor: pointer; transition: 0.3s; }
    .hero button:hover { background: #333; }

    .projects-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
    .project-card { padding: 20px; background: #f5f5f5; border-radius: 8px; transition: transform 0.3s, box-shadow 0.3s; }
    .project-card:hover { transform: translateY(-5px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
    .project-card h3 { margin-bottom: 10px; color: #333; }

    .todo-list input { padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px; }
    .todo-list button { padding: 8px 12px; border: none; background: #4e54c8; color: white; border-radius: 5px; cursor: pointer; }
    .todo-item { margin: 5px 0; padding: 8px; background: #eaeaea; border-radius: 5px; display: flex; justify-content: space-between; }

    .products { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; }
    .product { padding: 15px; border: 1px solid #ddd; border-radius: 8px; background: #fafafa; transition: 0.3s; }
    .product:hover { transform: translateY(-4px); }
    .filters { margin-bottom: 15px; display: flex; gap: 10px; }
    .filters select { padding: 8px; border-radius: 5px; }

    form { display: flex; flex-direction: column; gap: 10px; }
    form input, form textarea { padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%; }
    form button { padding: 10px; background: #4e54c8; color: white; border: none; border-radius: 6px; cursor: pointer; transition: 0.3s; }
    form button:hover { background: #333; }
  </style>
</head>
<body>
  <header>
<h1>Welcome Guys!!</h1>
    <p>V.Tharun Kumar Reddy</p>
    
  </header>
  <nav>
    <a href="#" onclick="showSection('home')">Home</a>
    <a href="#" onclick="showSection('about')">About</a>
    <a href="#" onclick="showSection('projects')">Projects</a>
    <a href="#" onclick="showSection('todo')">To-Do List</a>
    <a href="#" onclick="showSection('products')">Products</a>
    <a href="#" onclick="showSection('contact')">Contact</a>
  </nav>

  <div class="container">
    <section id="home" class="active">
      <div class="hero">
        <h2>Welcome to My Internship Portfolio</h2>
        <p>Showcasing my journey in Web Development with HTML, CSS, and JavaScript.</p>
        <button onclick="showSection('projects')">View My Work</button>
      </div>
    </section>

    <section id="about">
      <h2>About Me</h2>
      <p>I am <b>V.Tharun kumar Reddy</b>, an intern at ApexPlanet. This portfolio highlights my growth in web development with practical tasks, including responsive design, interactivity, API integration, and persistence.</p>
    </section>

    <section id="projects">
      <h2>Projects</h2>
      <div class="projects-list">
        <div class="project-card"><h3>Task 1</h3><p>Responsive Webpage using HTML + CSS.</p></div>
        <div class="project-card"><h3>Task 2</h3><p>Interactive Image Carousel with JavaScript.</p></div>
        <div class="project-card"><h3>Task 3</h3><p>Joke Generator using API Integration.</p></div>
        <div class="project-card"><h3>Task 4</h3><p>To-Do List with LocalStorage + Product Listing with Filters.</p></div>
      </div>
    </section>

    <section id="todo">
      <h2>To-Do List</h2>
      <div class="todo-list">
        <input type="text" id="taskInput" placeholder="Enter a task">
        <button onclick="addTask()">Add</button>
      </div>
      <div id="taskList"></div>
    </section>

    <section id="products">
      <h2>Products</h2>
      <div class="filters">
        <select id="categoryFilter" onchange="filterProducts()">
          <option value="all">All</option>
          <option value="electronics">Electronics</option>
          <option value="books">Books</option>
          <option value="accessories">Accessories</option>
        </select>
        <select id="sortFilter" onchange="sortProducts()">
          <option value="default">Sort By</option>
          <option value="price">Price</option>
          <option value="rating">Rating</option>
        </select>
      </div>
      <div class="products" id="productList"></div>
    </section>

    <section id="contact">
      <h2>Contact Me</h2>
      <form id="contactForm">
        <input type="text" placeholder="Your Name" required>
        <input type="email" placeholder="Your Email" required>
        <textarea rows="4" placeholder="Your Message"></textarea>
        <button type="submit">Send Message</button>
      </form>
    </section>
  </div>

  <script>
    function showSection(id) {
      document.querySelectorAll("section").forEach(sec => sec.classList.remove("active"));
      document.getElementById(id).classList.add("active");
    }

    function loadTasks() {
      const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
      document.getElementById("taskList").innerHTML = "";
      tasks.forEach((t, i) => {
        document.getElementById("taskList").innerHTML += <div class="todo-item">${t} <button onclick="deleteTask(${i})">❌</button></div>;
      });
    }
    function addTask() {
      const task = document.getElementById("taskInput").value;
      if(task.trim() === "") return;
      const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
      tasks.push(task);
      localStorage.setItem("tasks", JSON.stringify(tasks));
      document.getElementById("taskInput").value = "";
      loadTasks();
    }
    function deleteTask(index) {
      const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
      tasks.splice(index, 1);
      localStorage.setItem("tasks", JSON.stringify(tasks));
      loadTasks();
    }
    loadTasks();

    const products = [
      { name: "Smartphone", category: "electronics", price: 500, rating: 4 },
      { name: "Laptop", category: "electronics", price: 1000, rating: 5 },
      { name: "Book - JavaScript", category: "books", price: 30, rating: 5 },
      { name: "Headphones", category: "electronics", price: 100, rating: 3 },
      { name: "Smartwatch", category: "electronics", price: 200, rating: 4 },
      { name: "Book - HTML & CSS", category: "books", price: 25, rating: 4 },
      { name: "Wireless Mouse", category: "accessories", price: 40, rating: 4 },
      { name: "Backpack", category: "accessories", price: 60, rating: 5 }
    ];
    function displayProducts(items) {
      document.getElementById("productList").innerHTML = items.map(p => 
        <div class="product"><h4>${p.name}</h4><p>Category: ${p.category}</p><p>Price: $${p.price}</p><p>⭐ ${p.rating}</p></div>
      ).join("");
    }
    function filterProducts() {
      const category = document.getElementById("categoryFilter").value;
      let filtered = category === "all" ? products : products.filter(p => p.category === category);
      displayProducts(filtered);
    }
    function sortProducts() {
      const sort = document.getElementById("sortFilter").value;
      let sorted = [...products];
      if(sort === "price") sorted.sort((a,b)=>a.price-b.price);
      if(sort === "rating") sorted.sort((a,b)=>b.rating-a.rating);
      displayProducts(sorted);
    }
    displayProducts(products);

    document.getElementById("contactForm").addEventListener("submit", function(e) {
      e.preventDefault();
      alert("Thank you for contacting me, I'll reply soon!");
      this.reset();
    });
  </script>
</body>
</html>
