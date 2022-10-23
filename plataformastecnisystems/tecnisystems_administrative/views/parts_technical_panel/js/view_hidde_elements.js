function view_hidde_btns (hiddeList,viewList){
  hiddeList.forEach((el) => {
    if (!el.classList.contains("hidden")){
      el.classList.add("hidden");
    }
  });
  viewList.forEach((el) => {
    if (el.classList.contains("hidden")){
      el.classList.remove("hidden");
    }
  });
}
