const mongoose = require("mongoose");
const bcrypt = require('bcryptjs');
const jwt = require("jsonwebtoken");

const userSchema = new mongoose.Schema({
    firstname: {
        type:String, 
        //required: true
    },
    lastname: {
        type:String, 
        //required: true
    },
    email: {
        type:String, 
        required: true,
        unique: true
    },
    gender: {
        type:String, 
        required: true
    },
    password: {
        type:String, 
        required: true
    },
    confirmpassword: {
        type:String, 
        required: true
    }
})

// userSchema.methods.generateAuthToken = async function(){
//     try {
//         const token = jwt.sign({_id:this._id.toString()}, "jfayt63292na:#$@%#$@37yaka@$!@^%&^*?<>*?&farnjaapkf");
//         console.log(error)
//     } catch(error) {
//         res.send("The error is:" + error);
//         console.log("The error is:" + error);
//     }
// };

const Register = new mongoose.model("Register",userSchema);
module.exports = Register;