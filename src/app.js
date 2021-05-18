const express = require('express')
const app = express();
const path = require('path');
const hbs = require('hbs');
const bcrypt = require('bcryptjs');
require("./db/conn");
const Register = require('./models/registers');
const { urlencoded } = require('express');
//const jwt = require("jsonwebtoken");
const port = process.env.PORT || 5000;
const fetch = require("node-fetch");
const axios = require('axios');

const static_path = path.join(__dirname,"../css");
const template_path = path.join(__dirname,"../templates/views");
const partials_path = path.join(__dirname,"../templates/partials");

app.use(express.json());
app.use(express.urlencoded({extended: false}));

app.use(express.static(static_path));
app.set("view engine","hbs");
app.set("views",template_path);
hbs.registerPartials(partials_path);

app.get('/login',(req,res)=>{
    res.render("login");
})

app.get('/',(req,res)=>{
    res.render("register");
}); 

app.get('/register',(req,res)=>{
    res.render("register");
});

app.get('/fakelogin',(req,res)=> {
    const getData = () => {
        axios.get('http://localhost:5001/login').then(response => {
            console.log(response);
        })
    }
})

app.post('/login', async (req,res)=> {
    let issues=[];
    try {
        const email = req.body.email;
        const password = req.body.password;
        //const returnname = req.body.firstname;

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

	// if (await bcrypt.compare(password, user.password)) {
	// 	// the username, password combination is successful

	// 	const token = jwt.sign(
	// 		{
	// 			id: user._id,
	// 			username: user.username
	// 		},
	// 		JWT_SECRET
	// 	)

	// 	return res.json({ status: 'ok', data: token })
	// }

	//res.json({ status: 'error', error: 'Invalid username/password' })

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
            //console.log("The success part" + registerStudent);

            //const token = await registerStudent.generateAuthToken();
            //console.log("The token Part" + token);

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

// const createToken = async() => {
//     const token = await jwt.sign({_id:""}, "jfayt63292na:#$@%#$@37yaka@$!@^%&^*?<>*?&farnjaapkf",{
//         expiresIn: "59 minutes"
//     });
//     console.log(token);
// }
// createToken();

app.listen(port, () =>{
    console.log(`Server running on ${port}`);
})