async function request(url, data, headers = {}){
  const options = {
    method: 'POST',
    body: null,
    headers: {}
  }

  try {
    const response = await fetch(url, {...options, body: data, headers: headers});

    if(!response.ok){
      return
    }
    
    const responseData = await response.json();
    return responseData;
    
    // const responseData = await response.text();
    // console.log(responseData)
  } catch (error) {
    toast(error, 'error');
  }
}