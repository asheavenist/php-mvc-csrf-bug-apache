<h1>CSRF with Session - Post Method</h1>

<p>
  Gunakan form di bawah jika mengakses melalui <code>http://localhost/practice/bug-csrf/public/</code><br>
  Semua berjalan sesuai dengan ekspektasi
</p>
<form action="http://localhost/practice/bug-csrf/public/" method="post">
  <label for="form-token">csrf-token</label>
  <input type="text" name="form-token" id="form-token" value="<?= $data['form-token'] ?>" style="width: 30rem"><br />
  <button type="submit" name="submit" style="margin-top: 1rem">Submit</button>
</form>
