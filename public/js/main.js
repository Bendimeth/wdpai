const uploadImage = (files) => {
    const fd = new FormData();
    fd.append('file', files);
    $.ajax({
        url: 'src/utils/uploadFile.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false
    });
}

const parseFilePath = (path) => {
    return `public/uploads/${path.split('\\')[path.split('\\').length - 1]}`
}