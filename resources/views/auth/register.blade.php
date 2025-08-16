<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="style.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="wrapper">
    <h1>Register</h1>

    @if ($errors->any())
    <div class="error-messages">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form id="registerForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
      @csrf
      <div class="input-group">
        <label for="name"><span>@</span></label>
        <input type="text" name="name" id="name" placeholder="Full Name" required value="{{ old('name') }}">
      </div>

      <div class="input-group">
        <label for="email"><span>@</span></label>
        <input type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
      </div>

      <div class="input-group">
        <label for="password">
          🔒
        </label>
        <input type="password" name="password" id="password" placeholder="Password" required>
      </div>

      <div class="input-group">
        <label for="password_confirmation">
          🔒
        </label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password" required>
      </div>

      <div class="input-group">
        <label for="phone"><span>☎️</span></label>
        <input type="tel" name="phone" id="phone" placeholder="Phone Number" required value="{{ old('phone') }}">
      </div>

      <div class="role-selection">
        <label class="form-check">
          <input type="checkbox" required>
          I agree with all statements in Terms of Service
        </label>
      </div>

      <button type="submit" class="btn-submit">Register</button>

      <button type="button" class="btn-google" onclick="alert('Login Google belum diaktifkan.')">
        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Icon">
        Login dengan Google
      </button>
    </form>

    <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
  </div>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');

    :root {
      --accent-color: #4D2D8C;
      --base-color: #fff;
      --text-color: #2E2B41;
      --input-color: #F3F0FF;
      --error-color: #f06272;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      font-family: 'Poppins', sans-serif;
      font-size: 12pt;
      color: var(--text-color);
    }

    body {
      min-height: 100vh;
      background-color: var(--accent-color);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .wrapper {
      background-color: var(--base-color);
      width: 100%;
      max-width: 500px;
      padding: 40px 20px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      font-size: 2.2rem;
      font-weight: 900;
      margin-bottom: 20px;
    }

    .error-messages {
      color: var(--error-color);
      margin-bottom: 15px;
      text-align: left;
      max-width: 400px;
      margin: 0 auto 15px;
    }

    .error-messages ul {
      padding-left: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 18px;
    }

    .input-group {
      display: flex;
      width: 100%;
      max-width: 400px;
    }

    .input-group label {
      width: 50px;
      height: 50px;
      background-color: var(--accent-color);
      color: var(--base-color);
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 10px 0 0 10px;
      flex-shrink: 0;
      cursor: pointer;
      font-size: 1.2rem;
    }

    .input-group input {
      flex: 1;
      height: 50px;
      padding: 0 1em;
      border: 2px solid var(--input-color);
      border-left: none;
      border-radius: 0 10px 10px 0;
      background-color: var(--input-color);
      font: inherit;
      transition: border 0.2s;
    }

    .input-group input:focus {
      outline: none;
      border-color: var(--text-color);
    }

    .role-selection {
      width: 100%;
      font-size: 0.9rem;
      padding: 5px 10px;
      color: #555;
      text-align: left;
      max-width: 400px;
    }

    .form-check input {
      margin-right: 8px;
    }

    form button {
      padding: 0.85em 2em;
      border: none;
      border-radius: 1000px;
      background-color: var(--accent-color);
      color: var(--base-color);
      font-weight: 600;
      text-transform: uppercase;
      cursor: pointer;
      transition: background 0.2s, transform 0.2s;
    }

    form button:hover,
    form button:focus {
      background-color: var(--text-color);
      transform: scale(1.02);
      outline: none;
    }

    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      max-width: 400px;
    }

    .btn-google img {
      width: 20px;
      height: 20px;
    }

    .login-link {
      margin-top: 15px;
      font-size: 0.9rem;
    }

    a {
      color: var(--accent-color);
      font-weight: 500;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    /* Responsif Tablet */
    @media (max-width: 768px) {
      .wrapper {
        padding: 30px 15px;
        border-radius: 15px;
      }

      .input-group {
        max-width: 100%;
      }

      form button {
        width: 100%;
      }
    }

    /* Responsif Mobile */
    @media (max-width: 480px) {
      html {
        font-size: 10pt;
      }

      .wrapper {
        padding: 25px 10px;
        border-radius: 10px;
      }

      h1 {
        font-size: 1.8rem;
      }

      .input-group label,
      .input-group input {
        height: 40px;
        font-size: 0.9rem;
      }

      .input-group input {
        padding: 0 0.8em;
      }

      form button {
        font-size: 0.9rem;
        padding: 0.75em 2em;
      }
    }
  </style>
</body>

</html>