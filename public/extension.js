// // The ID of the extension we want to talk to.
// var editorExtensionId = "mompmbokkpeocaddkkjkkajfblkmbchm";
//
// // Make a simple request:
// chrome.runtime.sendMessage(editorExtensionId, {openUrlInEditor: 'ssssss'},
//     function(response) {
//         if (!response.success)
//             handleError(url);
// });
// const commonAjax = async (event)=> {
//     var data = event.detail;
//     console.log('data',data)
//
//     $('#spinner').show();
//     let response = {}
//     try {
//         response = await $.ajax({
//             type: "GET",
//             url: `${BASE_URL}/get/authorize/${data}`,
//             data: {}
//         })
//         if (response) {
//             $('#spinner').hide();
//         }
//     }catch (e) {
//         $('#spinner').hide();
//     }
//
//     console.log('response',response)
//     return response;
//     // Do something with you data from CRX
// }
//
// // Listen you CRX event
// document.addEventListener('csEvent', commonAjax);

chrome.storage.local.set({ extension: extension_info }).then(() => {})


