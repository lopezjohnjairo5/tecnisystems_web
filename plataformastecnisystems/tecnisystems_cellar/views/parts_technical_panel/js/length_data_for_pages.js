function length_data_for_pages(new_data, amount){
  let length_data = new_data.length; // longitud total de datos de la tabla
  let amount_pages_full_number = length_data / amount; // cantidad de paginas expresada en float
  let amount_pages_int = Math.trunc(amount_pages_full_number); // cantidad de paginas en INT
  let amount_pages_decimal = amount_pages_full_number - amount_pages_int; // decimal restante de cant de pag

  // si la parte decimal es mayor a cero, significa que aun hay mas datos, asi que agregamos una pagina mas
  if (amount_pages_decimal > 0) {
    amount_pages_int +=1;
  }
  return {
    length_data,
    amount_pages_full_number,
    amount_pages_decimal,
    amount_pages_int
  };
}
