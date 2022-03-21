import { LoginService } from './../../services/login.service';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  loginForm = new FormGroup({
    codusr: new FormControl('', Validators.required),
    password: new FormControl('', Validators.required)
  }
  )
  constructor(private router: Router, private loginService: LoginService) { }

  ngOnInit(): void {
  }

  login() {
    //console.log(this.loginForm.value);
    this.loginService.login(this.loginForm.value).subscribe({
      next: (data) => {
        if (data.ok) {
          localStorage.setItem("token", data.token);
          this.router.navigateByUrl("/home");
        }
      },
      error: (e) => {
        alert("Credenciales invalidas");
      }
    });

  }

}
