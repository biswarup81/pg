const path = require('path')
const request = require("request")
const express = require('express')
const hbs = require('hbs')
const geocode = require('./utils/geocode')
const forecast = require('./utils/forecast')

const bodyParser = require('body-parser');

const app = express() 

// Define paths for Express config
const publicDirectoryPath = path.join(__dirname, '../public')
const viewsPath = path.join(__dirname, '../templates/views')
const partialsPath = path.join(__dirname, '../templates/partials')

app.use(bodyParser.urlencoded({extended: true}));
// Setup handlebars engine and views location
app.set('view engine', 'hbs')
app.set('views', viewsPath)
hbs.registerPartials(partialsPath)

// Setup static directory to serve
app.use(express.static(publicDirectoryPath))


app.get('', (req, res) => {
    res.render('index', {
        title: 'pginfoservice.com - Computer, Laptop sell purchase, annual maintenance, computer rent, Easy EMI',
        name: 'PGINFOSERVICES PRIVATE LIMITED'
    })
})

/*app.post('/predict',(req,res) =>{
    console.log('Predict button clicked');
    console.log(req.body);
    return res.send(req.body);
}) */
app.post('/predict', (req, res) => {
    console.log('Predict button clicked');
    //console.log(req.body);
    const uri = "https://ussouthcentral.services.azureml.net/workspaces/ef05b5231ee742e4a71e9f4d7347a694/services/684f095d983346b1bf8bc05404737faf/execute?api-version=2.0&format=swagger";
    const apiKey = "krE8Wvuw3kURYrR/WHdISiDcVuMymgCoWr8MWr3u/up+RAb6o7/xcOwrZ4vOcYJf/8J6T3JuabhrRHqk8yJMeg==";
    const data = {
        "Inputs": {
                "input1":
                [
                    {
                            'PRODUCT_NAME': req.body.PRODUCT_NAME,   
                            'COUNTRY': req.body.COUNTRY,   
                            'IS_IRRIGATED': req.body.IS_IRRIGATED,   
                            'TREATMENT_NAME': req.body.TREATMENT_NAME,   
                            'PREVIOUS_CROP': req.body.PREVIOUS_CROP,   
                            'SOIL_TEXTURE': req.body.SOIL_TEXTURE,   
                            'PLANTING_DATE': "2016-04-23T00:00:00Z",   
                            'YIELD': "109.662322",   
                            'YIELD_UOM': "Quintals/Hectare",   
                            'MOISTURE_PERCENTAGE': req.body.MOISTURE_PERCENTAGE,   
                            'NEW_YIELD': "1234.22",   
                            'CATEGORISED_YIELD': "AVERAGE",   
                            'PLANTING_WEEK': req.body.PLANTING_WEEK  
                    }
                ],
        },
    "GlobalParameters":  {
        }
   };
    //console.log("input data for web-service is "+JSON.stringify(data));
    const options = {
        uri: uri,
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": "Bearer " + apiKey,
        },
        body: JSON.stringify(data)
    }
   
    
    var prediction = {};
    request(options, (err, response, body) => {
        
        if (!err && response.statusCode == 200) {
            //console.log(body);
            var result = JSON.parse(body)
            //console.log(result.Results.output1[0]["Scored Labels"]);
            var res1 = result.Results.output1[0]["Scored Labels"];
            //return res.send('predict_result',res1);
            
            res.render('predict_result',{"Scored_Labels": res1});
            //res.render('index', body)
        } else {
            console.log("The request failed with status code: " + response.statusCode);
            return res.send("The request failed with status code: " + response.statusCode);
        }
    }) 
   
    
} ) 

/*app.post('/predict', function(req, res, next) {
    console.log('Predict button is clicked');
    console.log('request ->'+req.body);
    res.render('index', {
        title: 'Weather',
        name: 'Andrew Mead'
    })
    request(options, (err, response, body) => {
        if (!err && response.statusCode == 200) {
            console.log(body);
            res.render('index', {
                title: 'Weather',
                name: 'Andrew Mead'
            })
        } else {
            console.log("The request failed with status code: " + res.statusCode);
        }
    }) 
  }); */

  

  
app.get('/about', (req, res) => {
    res.render('about', {
        title: 'About Us',
        name: 'Cognizant Hackathon CALIBER 2020 - TeamYNot'
    })
})

app.get('/help', (req, res) => {
    res.render('help', {
        helpText: 'This is some helpful text.',
        title: 'Help',
        name: 'Cognizant Hackathon CALIBER 2020 - TeamYNot'
    })
})

app.get('/weather', (req, res) => {
    if (!req.query.address) {
        return res.send({
            error: 'You must provide an address!'
        })
    }

    geocode(req.query.address, (error, { latitude, longitude, location } = {}) => {
        if (error) {
            return res.send({ error })
        }

        forecast(latitude, longitude, (error, forecastData) => {
            if (error) {
                return res.send({ error })
            }

            res.send({
                forecast: forecastData,
                location,
                address: req.query.address
            })
        })
    })
})

app.get('/products', (req, res) => {
    if (!req.query.search) {
        return res.send({
            error: 'You must provide a search term'
        })
    }

    console.log(req.query.search)
    res.send({
        products: []
    })
})

app.get('/help/*', (req, res) => {
    res.render('404', {
        title: '404',
        name: 'Cognizant Hackathon CALIBER 2020 - TeamYNot',
        errorMessage: 'Help article not found.'
    })
})

app.get('*', (req, res) => {
    res.render('404', {
        title: '404',
        name: 'Cognizant Hackathon CALIBER 2020 - TeamYNot',
        errorMessage: 'Page not found.'
    })
})

const port = process.env.PORT || 3000;

app.listen(port, () => {
    console.log('Server is up on port '+port);
})




    
    
   /*req(options, (err, res, body) => {
        if (!err && res.statusCode == 200) {
            console.log(body);
        } else {
            console.log("The request failed with status code: " + res.statusCode);
        }
    }) */
