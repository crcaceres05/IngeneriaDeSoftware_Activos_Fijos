export interface ILogin{
  codusr : string;
  password : string;
}


export interface IResponseLogin {
  ok: boolean;
  token: string;
  message?:string;
}
