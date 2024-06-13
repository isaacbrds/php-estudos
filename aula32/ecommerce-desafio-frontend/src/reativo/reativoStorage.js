export const reativoStorage = {
    get(key){
        return localStorage.getItem(key);
    },
    set(key, value){
        localStorage.setItem(key, value);
        window.dispatchEvent( new Event( 'storage' ));
    },
    remove(key){
        localStorage.removeItem(key);
        window.dispatchEvent( new Event( 'storage' ));
    }
}