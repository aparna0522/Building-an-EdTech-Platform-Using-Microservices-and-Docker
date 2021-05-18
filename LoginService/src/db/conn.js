const mongoose = require('mongoose');

mongoose.connect("mongodb://mongo:27017/LoginRegDb",{
    useNewUrlParser: true,
    useUnifiedTopology: true,
    useCreateIndex: true
}).then(()=>{
    console.log("Connection Successful.")
}).catch((e) => {
    console.log("Connection Failed.");
});
