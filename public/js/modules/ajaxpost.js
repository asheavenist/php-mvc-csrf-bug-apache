export default async function ajaxPost(url, data) {
  const response = await fetch(url, {
    method: 'post',
    body: data
  })

  // return response.text() // use this line if you want to debugging
  return response.json()
}
