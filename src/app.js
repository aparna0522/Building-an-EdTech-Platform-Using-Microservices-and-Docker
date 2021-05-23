const express = require('express')
const app = express();
const path = require('path');
const hbs = require('hbs');
const bcrypt = require('bcryptjs');
require("./db/conn");

const Register = require('./models/registers');
const { urlencoded } = require('express');
const port = process.env.PORT || 5000;

const static_path = path.join(__dirname,"../css");
const views_path = path.join(__dirname,"../views");

app.use(express.json());
app.use(express.urlencoded({extended: false}));

app.use(express.static(static_path));
app.set("view engine","hbs");
app.set("views",views_path);

app.get('/login',(req,res)=>{
    res.render("login");
})

app.get('/',(req,res)=>{
    res.render("register");
}); 

app.get('/register',(req,res)=>{
    res.render("register");
});

app.post('/login', async (req,res)=> {
    let issues=[];
    try {
        const email = req.body.email;
        const password = req.body.password;

        const useremail = await Register.findOne({ email }).lean()
        
        if(useremail.password === password) {
            res.json({
                id: useremail._id,
                name: useremail.firstname,
                status: 'ok',
                error: ""
            })
            
            issues.push("Success");
        } else {
            res.json({
                status: "error",
                error: "Invalid EmailID/password"
            })
            issues.push("Invalid Email/Password");
        }

    }catch(error) {
        res.json({
            status: "error",
            error: "Please register to login."
        });
    }
})

app.post('/register', async (req,res)=>{
    try {
        const password = req.body.password;
        const cpassword = req.body.confirmpassword;
        
        if (password === cpassword) {
            const registerStudent = new Register({
                firstname: req.body.firstname,
                lastname: req.body.lastname, 
                email: req.body.email, 
                gender: req.body.gender,
                password: password,
                confirmpassword: cpassword
            })
            
            if (password.length < 6) {
                return res.json({
                    status: 'error',
                    error: 'Password too small. Should have atleast 6 characters'
                })
            }

            //const password = bcrypt.hash(password, 10);
            const registered = await registerStudent.save();
            console.log('User created successfully: ', registered);
            res.json({status: 'ok'});
        } else {
            res.json({
                status: "error",
                error: "Passwords donot match"
            });
        }
    } catch(error) {
        if (error.code === 11000) {
            // duplicate key
            return res.json({ status: 'error', error: 'Username already in use' })
        } else {
            //Hardcoded error! 
            res.json({
                status: "404",
                error: "Error: Please ensure that you have filled in all the mandatory fields."
            });
        }
    }
});

app.listen(port, () =>{
    console.log(`Server running on ${port}`);
})