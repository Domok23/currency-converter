<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar</title>
    <style>
        #image-upload-area {
            content: 'Or Paste image here...';
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            min-height: 100px;
            position: relative;
            margin-top: 20px
        }

        #image-upload-area:empty::before {
            content: 'Or Paste image here...';
            color: #aaa;
            position: absolute;
            top: 20px;
            left: 20px;
            pointer-events: none;
        }

        #uploaded-images img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div id="image-upload-area" contenteditable="true">
    </div>

    <!-- Tombol untuk meng-upload gambar -->
    <button id="upload-button" style="margin-top: 20px;">Upload Image</button>

    <!-- Area untuk menampilkan gambar yang berhasil di-upload -->
    <div id="uploaded-images" style="margin-top: 20px;">
        <h3>Uploaded image:</h3>
        <div id="image-container"></div>
    </div>

    <script>
        const uploadArea = document.getElementById('image-upload-area');
        const imageContainer = document.getElementById('image-container');
        const uploadButton = document.getElementById('upload-button');
        let pastedFile = null;

        // Event untuk menangani paste gambar
        uploadArea.addEventListener('paste', function (event) {
            const items = event.clipboardData.items;
            for (let item of items) {
                if (item.type.indexOf('image') !== -1) {
                    const file = item.getAsFile();
                    pastedFile = file; // Simpan file yang dipaste untuk di-upload nanti

                    // Tampilkan preview gambar di area konten
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        uploadArea.innerHTML = `<img src="${e.target.result}" style="width: 100px; height: auto;">`;
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        // Event untuk meng-upload gambar saat tombol diklik
        uploadButton.addEventListener('click', function () {
            if (pastedFile) {
                const formData = new FormData();
                formData.append('image', pastedFile);

                fetch('/image-upload', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.success);

                        // Buat elemen <img> untuk menampilkan gambar yang sudah di-upload
                        const imgElement = document.createElement('img');
                        imgElement.src = '/uploads/' + data.filename;  // Menambahkan URL gambar yang di-upload
                        imgElement.style.width = '100px';
                        imgElement.style.height = 'auto';
                        imageContainer.appendChild(imgElement);

                        // Bersihkan area paste setelah upload
                        uploadArea.innerHTML = '';
                        pastedFile = null;
                    } else {
                        alert('Upload failure: ' + data.error);
                    }
                });
            } else {
                alert('No images are pasted.');
            }
        });
    </script>
</body>
</html>
