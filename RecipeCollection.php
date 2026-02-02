<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recipe Collection</title>
  <link rel="stylesheet" href="recipe-style.css">
</head>
<style>
    body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
  background-color: #f8f9fa;
}

.container {
  max-width: 1200px;
  margin: auto;
  padding: 20px;
}

.search-bar {
  text-align: center;
  margin: 30px 0;
}

.search-bar input {
  width: 60%;
  padding: 12px 20px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 25px;
  transition: all 0.3s ease;
}

.search-bar input:focus {
  outline: none;
  border-color: #0f5132;
  box-shadow: 0 0 8px rgba(15, 81, 50, 0.3);
}

section {
  margin-top: 40px;
}

section h2 {
  font-size: 24px;
  color: #1a1a1a;
  margin-bottom: 20px;
}

.card-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 20px;
}

.card {
  background-color: #fff;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
  text-align: center;
}

.card img {
  width: 100%;
  height: 140px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.card p {
  padding: 10px;
  font-size: 16px;
  font-weight: 500;
  color: #333;
  background-color: #fff;
}

.card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 25px rgba(0, 100, 50, 0.25);
}

.card:hover img {
  transform: scale(1.05);
}

</style>
<body>


  <div class="container">

    <div class="search-bar">
      <input type="text" placeholder="Search recipes...">
    </div>

    <section>
      <h2>Latest Recipes</h2>
      <div class="card-grid">
        <div class="card">
          <img src="images/recipe1.jpg" alt="Recipe">
          <p>Fresh Tomato Soup</p>
        </div>
        <div class="card">
          <img src="images/recipe2.jpg" alt="Recipe">
          <p>Chicken Wings with Honey Sauce</p>
        </div>
        <div class="card">
          <img src="images/recipe3.jpg" alt="Recipe">
          <p>Egg Salad Wrap</p>
        </div>
        <div class="card">
          <img src="images/recipe4.jpg" alt="Recipe">
          <p>Grilled Salmon</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Fresh from Our Community</h2>
      <div class="card-grid">
        <div class="card">
          <img src="images/community1.jpg" alt="Community Recipe">
          <p>Stuffed Chicken with Spicy Sauce</p>
        </div>
        <div class="card">
          <img src="images/community2.jpg" alt="Community Recipe">
          <p>Fried Noodles with Chicken</p>
        </div>
        <div class="card">
          <img src="images/community3.jpg" alt="Community Recipe">
          <p>Pizza Margherita</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Explore Nigerian Recipes</h2>
      <div class="card-grid">
        <div class="card">
          <img src="images/nigeria1.jpg" alt="Nigerian Recipe">
          <p>Jollof Rice</p>
        </div>
        <div class="card">
          <img src="images/nigeria2.jpg" alt="Nigerian Recipe">
          <p>Egusi Soup</p>
        </div>
        <div class="card">
          <img src="images/nigeria3.jpg" alt="Nigerian Recipe">
          <p>Moi Moi</p>
        </div>
        <div class="card">
          <img src="images/nigeria4.jpg" alt="Nigerian Recipe">
          <p>Fufu</p>
        </div>
      </div>
    </section>

  </div>

</body>
</html>
