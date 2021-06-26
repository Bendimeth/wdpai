// const button  = document.querySelector('.form-update-photo button').addEventListener('click', () => {
//     const file = document.querySelector('.forn-update-photo input').value;
//     if (!!file) {
//         const payload = {
//             file: file
//           };
          
//           fetch('src/controllers/SettingsController', {
//             method: 'POST',
//             headers: {
//               'Content-Type': 'application/json',
//             },
//             body: JSON.stringify(payload),
//           })
//             .then((response) => {
//               if (!response.ok) {
//                 throw Error(response.statusText);
//               }
//               return response;
//             })
//             .then((response) => response.json())
//             .then((data) => {
//               handleResponse(data, form);
//             })
//             .catch((error) => {
//               console.error(error);
//               alert('Couldnt send your email. Try again later.');
//             });
//     }
// });

// console.log(button);