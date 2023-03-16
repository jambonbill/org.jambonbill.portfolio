import { createElement } from "./dom.js";


/**
 * @typedef {object} Todo
 * @property {number} id
 * @property {string} title
 * @property {boolean} completed
 */
export class TableList { // A Table with our items
    
    /** @type {Todo[]} */
    #items=[];
    

    /** @type {HTMLUListElement} */
    #listElement=[]

    
    /**
     * 
     * @param {Todo[]} todos 
     */
    constructor(items){
        this.#items=items;
    }
 
    function makeTable(){
        const table=createElement('table',{
            class:'table table-hover'
        });

        //Row
        
        const tr=createElement('tr');
        const td=createElement('td');
        td.innertext='test td';
        tr.append(td);

        table.append(tr);

        this.#element=table;
    }

    /**
     * 
     * @param {HTMLElement} element 
     */
    appendTo(element){

        element.innerHTML=`<form class="d-flex pb-4">
        <input required="" class="form-control" type="text" placeholder="Acheter des patates..." name="title"
            data-com.bitwarden.browser.user-edited="yes">
        <button class="btn btn-primary">Ajouter</button>
        </form>
        <main>
            <div class="btn-group mb-4" role="group">
                <button type="button" class=" btn btn-outline-primary active" data-filter="all">Toutes</button>
                <button type="button" class=" btn btn-outline-primary" data-filter="todo">A faire</button>
                <button type="button" class=" btn btn-outline-primary" data-filter="done">Fairtes</button>
            </div>

            <ul class="list-group"></ul>
        </main>`;
    
        //form
        document.querySelector('form').addEventListener('submit',e=>this.onSubmit(e));
        
        //buttons
        document.querySelectorAll('.btn-group button').forEach(button=>{
            button.addEventListener('click',e=>this.#toggleFilter(e));
        });


        this.#listElement=document.querySelector('.list-group')

        //console.log(this.#todos);
        for(let todo of this.#todos){

            const t=new TodoListItem(todo);
            //console.log(t);
            //t.appendTo(this.#listElement);
            this.#listElement.append(t.element);
        } 

    }


}

class TodoListItem{


    #element=null;

    /** @type {Todo} */
    constructor(todo){
        const id=`todo-${todo.id}`
        const li=createElement('li',{
            class:'todo list-group-item d-flex align-items-center'
        });

        const checkbox=createElement('input',{
            type:'checkbox',
            class:'form-check-input',
            id:id,
            checked:todo.completed
        })

        li.append(checkbox);
        
        const label=createElement('label',{
            class:'ms-2 form-check-label',
            for:id
        });
        label.innerText=todo.title;
        
        li.append(label)

        const button=createElement('button',{
            class:'ms-auto btn btn-danger'
        })
        button.innerHTML='<i class="bi-trash"></i>';
        
        li.append(button)

        button.addEventListener('click',e=>this.remove(e));
        
        this.#element=li;
    }

    /**
     * @return {HTMLElement}
     */
    get element (){
        return this.#element;
    }

    appendTo(el){
        //console.log(el)   
        el.append(this.#element);
    }

    remove(e){
        e.preventDefault();
        this.#element.remove();
    }

}
