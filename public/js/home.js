document.querySelector('form').addEventListener('submit', async function(event) {
  event.preventDefault()

  const form = event.target,
    formData = new FormData(form)

  try {
    const response = await fetch('/', {
      method: 'POST',
      body: formData
    })

    const result = await response.json() // Bisa juga pakai .json() jika responsenya JSON
    console.log(result)
    return
    document.getElementById('response').innerHTML = result;
  } catch (error) {
    console.log(error);
    return
    console.error('Error:', error);
    document.getElementById('response').innerHTML = 'Terjadi kesalahan saat mengirim data.';
  }
});
