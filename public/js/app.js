import { fetchJson } from "./api.js";
import { createElement } from "./dom.js";
//import { TodoList } from "./TodoList.js";

let url='https://api.jambonbill.org/portfolio/';
url='json/data.json';//dev/debug


try{
    const items=await fetchJson(url,{mode: "no-cors"});
    console.log(items);
    
    //const table=new TableList(todos);
    //table.appendTo(document.getElementById('pfitems'));
    
    
} catch(e){
     //const div = document.createElement('div')
     const alertElement=createElement('div',{
        class:'alert alert-danger m-2',
        role:'alert'
     })

     alertElement.innerText=e;
     //alertElement.innerHTML="et ca deconne encore!";
     document.body.prepend(alertElement);    
     console.error(e);
}


/*
const response = await fetch(url, {
  headers:{
    'Accept': 'application/json',
    'Mode':'no-cors'
  }
}).then((response) => response.json())
  .then((data) => {
    console.log(data);
  });

  */