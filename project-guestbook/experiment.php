<style>
  * {
    margin: 0;
    padding: 0;
    font-family: "Lato", sans-serif;
  }

  body {
    background-color: #fff6f2;
  }

  .grid {
    display: grid;
    gap: 1rem;
  }

  .container {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: left;
  }

  .hero-title {
    text-align: center;
  }

  .hero-input {

    display: flex;
    justify-content: center;
    flex-direction: column;
    text-align: left;
  }

  input,
  textarea {
    padding: 0.5rem;
    border-radius: 0.5rem;
    border: none;
    border: 2px solid #4a3f35;
    background-color: whitesmoke;
  }

  span {
    font-size: 20px;
    font-weight: bold;
  }

  .hero-input {
    max-width: 20rem;
    border: 2px solid #4a3f35;
    padding: 1.5rem;
    border-radius: 1rem;
    background-color: #fff;
  }

  .address,
  .message {
    height: 3rem;
  }


  .attendances {
    display: flex;
    justify-content: space-evenly;
    border: 2px solid #4a3f35;
    border-radius: 15px;
    background-color: whitesmoke;
  }

  label {
    display: flex;
    align-items: center;
  }

  .hero-submit {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .submit {
    width: 100%;
    border: none;
    padding: 10px 20px;
    border-radius: 0.5rem;
    background: #e8b4b8;
    font-size: 1rem;
    font-weight: bold;
    transition: 0.5s;
    color: #222;
  }

  .form-grup {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .submit:hover {
    background: #f78f98;
    /* text-shadow: 0px 4px 5px #4a3f35; */
    cursor: pointer;
    transform: scale(1.05);
  }

  .form-grup {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .hero-submit {
    display: flex;
    gap: 15px;

    button {
      width: 100%;
      color: white;
      padding: 12px;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
    }
  }

  .btn-update {
    background-color: #ff6b9a;
  }

  .btn-delete {
    background-color: #ff4d8d;
  }
</style>
<div class="container">
  <div class="hero-input ">

    <div class="hero-title">
      <h1>Enter Your Data</h1>
    </div>

    <form action="" method="POST" class="grid">

      <!-- input : Username -->
      <div class="form-grup">
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" class="inputs name" placeholder="Enter Your Full Name Here" required />
      </div>

      <!-- input : Phone Number -->
      <div class="form-grup">
        <label for="phoneNumber">Phone Number</label>
        <input type="tel" name="phoneNumber" id="phoneNumber" class="inputs number" placeholder="Enter Your Number Here"
          required />
      </div>

      <!-- input : Email -->
      <div class="form-grup">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="inputs email" placeholder="Enter Your Email Here" required />
      </div>

      <!-- input : Address -->
      <div class="form-grup">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="inputs address" placeholder="Enter Your Address Here"
          required></textarea>
      </div>

      <!-- input : Message -->
      <div class="form-grup">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="inputs message" placeholder="Enter Your Message Here"
          required></textarea>
      </div>

      <!-- button : submit -->
      <div class="hero-submit">
        <button type="submit" name="update" class="btn-update"> UPDATE DATA</button>
        <button type="button" onclick="confirmDelete()" class="btn-delete">DELETE DATA </button>
      </div>

    </form>
  </div>
</div>