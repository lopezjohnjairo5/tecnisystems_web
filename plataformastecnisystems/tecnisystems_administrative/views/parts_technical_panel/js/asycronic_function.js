function Async (params){
  setTimeout(function runAsync(){
    params.fn.call(undefined);
  },params.time);
}
