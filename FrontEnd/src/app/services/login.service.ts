import { environment } from './../../environments/environment';
import { ILogin, IResponseLogin } from './../interfaces/login.interface';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  urlBase = environment.apiUrl;
  constructor(private readonly http : HttpClient) { }

  login(data : ILogin){
    return this.http.post<IResponseLogin>(`${this.urlBase}/signin`, data)
  }
}
