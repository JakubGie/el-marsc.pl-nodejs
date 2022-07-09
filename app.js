const express = require('express')
const app = express()
const port = 3000

app.use(express.static('public'))

app.set('view engine', 'ejs')

app.get('/', (req, res) => {
    res.render('index', {
        'pageName': 'Strona główna'
    })
})

app.get('/oferta', (req, res) => {
    res.render('oferta', {
        'pageName': 'Oferta'
    })
})

app.get('/galeria', (req, res) => {
    res.render('galeria', {
        'pageName': 'Galeria'
    })
})

app.get('/wynajem', (req, res) => {
    res.render('wynajem', {
        'pageName': 'Wynajem'
    })
})

app.get('/kontakt', (req, res) => {
    res.render('kontakt', {
        'pageName': 'Kontakt'
    })
})

app.listen(port, () => {
    console.log('server is running on port ' + port)
})

app.use((req, res) => {
    res.status(404).render('404', {
        'pageName': '404'
    })
})