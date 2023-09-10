const sql = require('mssql')

// Конфігурація підключення до бази даних
const config = {
  user: 'username',
  password: 'password',
  server: 'localhost',
  database: 'database',
}

// Підключення до бази даних
sql.connect(config, err => {
  if (err) {
    console.error(err)
    return
  }

  // Запит до бази даних
  const request = new sql.Request()
  const id = 1 // ідентифікатор зображення, яке потрібно вивести
  request.query(`SELECT image_url FROM images WHERE id = ${id}`, (err, result) => {
    if (err) {
      console.error(err)
      return
    }

    const row = result.recordset[0]
    const imageUrl = row.image_url

    // Виведення зображення
    const img = document.createElement('img')
    img.src = imageUrl
    img.alt = 'Image'
    document.body.appendChild(img)
  })
})