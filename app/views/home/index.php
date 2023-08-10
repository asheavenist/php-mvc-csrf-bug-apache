<h1>CSRF with Session - Post Method</h1>

<p>
  Form ini diakses via <code>http://phpmvccsrf.test</code><br>
  Dan semua berjalan tidak sesuai ekspektasi
</p>
<form action="http://phpmvccsrf.test" method="post">
  <label for="form-token">csrf-token</label>
  <input type="text" name="form-token" id="form-token" value="<?= $data['form-token'] ?>" style="width: 30rem"><br />
  <button type="submit" name="submit" style="margin-top: 1rem">Submit</button>
</form>
