export default class Validator{


constructor(){

this.messages={};


}


getMessage(field){


	if (this.messages[field]) {

		return this.messages[field][0];
	}

}


setMessages(messages){

this.messages=messages;


}

empty(){



}
}