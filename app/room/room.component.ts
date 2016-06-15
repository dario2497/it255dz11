import { Component, Directive } from 'angular2/core';
import {Component, FormBuilder, Validators, ControlGroup, Control, FORM_DIRECTIVES, FORM_BINDINGS} from 'angular2/common'
import {Http, HTTP_PROVIDERS, Headers} from 'angular2/http';
import 'rxjs/Rx';
import {Router, ROUTER_PROVIDERS} from 'angular2/router'

@Component({ 
  selector: 'Room', 
  templateUrl: 'app/room/room.html',
  directives: [FORM_DIRECTIVES],
  viewBindings: [FORM_BINDINGS]
})

export class RoomComponent { 

  registerForm: ControlGroup;
  http: Http;
  router: Router;
  postResponse: String;
  select: Int = 1;
  
  constructor(builder: FormBuilder, http: Http,  router: Router) {
	this.http = http;
	this.router = router;
    this.registerForm = builder.group({
     naziv: ["", Validators.none],
     broj_kreveta: ["", Validators.none],
     broj_kvadrata: ["", Validators.none],
   });
  }
  
  onAddRoom(): void {
	var data = "naziv="+this.registerForm.value.naziv+
              "&broj_kreveta="+this.registerForm.value.broj_kreveta+
              "&broj_kvadrata="+this.registerForm.value.broj_kvadrata;
	var headers = new Headers();
	headers.append('Content-Type', 'application/x-www-form-urlencoded');
	this.http.post('http://localhost/php/addroom.php',data, {headers:headers})
    .map(res => res)
    .subscribe( data => this.postResponse = data,
	err => alert(JSON.stringify(err)),
	() => { 
	if(this.postResponse._body.indexOf("error") === -1){
		alert("Dodali ste sobu");
	    this.router.parent.navigate(['./Home']);
	 }else{
		alert("Greska! Niste dodali sobu");
	 }
	 }
	);
	
  }
}
