/**
 * 
 * @param {string} tagname 
 * @param {object} attributes
 * @return {HTMLElement} 
 */
export function createElement(tagname, attributes)
{
    const elem=document.createElement(tagname);
    for(const [k,v] of Object.entries(attributes)){
        if(v !== false && v !==null){
            elem.setAttribute(k, v);
        }
        
    }
    return elem;
}