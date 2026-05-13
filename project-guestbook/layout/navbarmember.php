
<div class="burger" onclick="toggleMenu()">
  <span class="material-symbols-outlined">menu</span>
</div>

<div class="navbar-profile">
  <img src="person.jpg" width="100" height="100" />
  <h2>
    <?php echo $_SESSION['username'] ?? 'Guest'; ?>
  </h2>
  <p>Welcome Member</p>
</div>

<ul>
  <li data-aos="fade-left" data-aos-duration="1000">
    <a href="dashboardmember.php">
      <span class="material-symbols-outlined">home</span>Dashboard
    </a>
  </li>
  <li data-aos="fade-left" data-aos-duration="1400">
    <a href="messagesmember.php">
      <span class="material-symbols-outlined">comment</span>Messages
    </a>
  </li>
  <li data-aos="fade-left" data-aos-duration="1600">
    <a href="login.php">
      <span class="material-symbols-outlined">logout</span>logout
    </a>
  </li>
</ul>