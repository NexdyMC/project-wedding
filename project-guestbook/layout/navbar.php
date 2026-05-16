
<div class="burger" onclick="toggleMenu()">
  <span class="material-symbols-outlined">menu</span>
</div>

<div class="navbar-profile" data-aos="fade-down" data-aos-duration="800">
  <img src="person.jpg" width="120" height="120" />
  <p>Welcome</p>
  <h2>
    <?php
      
      echo $_SESSION['username'] ?? 'Guest'; 
    ?>
  </h2>
</div>

<ul>
  <li data-aos="fade-left" data-aos-duration="1000">
    <a href="dashboard.php">
      <span class="material-symbols-outlined">home</span>Dashboard
    </a>
  </li>
  <li data-aos="fade-left" data-aos-duration="1200">
    <a href="quest.php">
      <span class="material-symbols-outlined">person</span>Quests
    </a>
  </li>
  <li data-aos="fade-left" data-aos-duration="1400">
    <a href="messages.php">
      <span class="material-symbols-outlined">comment</span>Messages
    </a>
  </li>
  <li data-aos="fade-left" data-aos-duration="1600">
    <a href="logout.php">
      <span class="material-symbols-outlined">logout</span>logout
    </a>
  </li>
</ul>