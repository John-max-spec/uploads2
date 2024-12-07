<div class="container">
    <div class="content">
        <!-- 上传表单 -->
        <form method="POST" action="{{ url('/uploads') }}" enctype="multipart/form-data" class="upload-form">
            @csrf
            <input type="file" name="upload" class="file-input">
            <button type="submit" class="btn save-btn">Save Upload</button>
        </form>

        <!-- 上传后显示的文件信息 -->
        @if (!empty($id))
            <div class="upload-info">
                <p>
                    <a href="{{ url('/uploads', [$id, $originalName]) }}" class="file-link">
                        {{ $id }} - {{ $originalName }}
                    </a>
                </p>

                @if (substr($mimeType, 6, 5) == 'image')
                    <img src="{{ url('/uploads', [$id, $originalName]) }}" alt="Uploaded Image" class="preview-image">
                @endif
            </div>
        @endif

        <!-- 其他文件信息 -->
        @isset($id)
            <div class="file-details">
                <p><strong>ID:</strong> {{ $id }}</p>
                <p><strong>Path:</strong> {{ $path }}</p>
                <p><strong>Original Name:</strong> {{ $originalName }}</p>
                <p><strong>Mime Type:</strong> {{ $mimeType }}</p>
            </div>
        @endisset

        <!-- 链接到 uploads -->
        <a href="{{ url('/uploads') }}" class="btn back-btn">View All Uploads</a>
    </div>
</div>

<!-- 样式部分 -->
<style>
    /* 居中布局 */
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 65vh;
        background-color:rgb(192, 192, 192);
        font-family: Arial, sans-serif;
        color: rgb(102, 205, 170);
    }

    .container {
        width: 100%;
        max-width: 600px;
        background: rgb(211, 211, 211);
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
        text-align: center;
    }

    /* 上传表单样式 */
    .upload-form {
        margin-bottom: 20px;
    }

    .file-input {
        display: block;
        margin: 10px auto;
        padding: 10px;
        border: 1px solid #0000FF;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        margin-top: 10px;
        background-color: #007bff;
        color: #ffffff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #f8f8f8;
    }

    .save-btn {
        background-color: #28a745;
    }

    .save-btn:hover {
        background-color: #218838;
    }

    .back-btn {
        background-color: #000080;
    }

    .back-btn:hover {
        background-color: #c82333;
    }

    /* 上传信息样式 */
    .upload-info {
        margin: 20px 0;
    }

    .file-link {
        text-decoration: none;
        font-weight: bold;
    }

    .file-link:hover {
        text-decoration: underline;
    }

    .preview-image {
        display: block;
        max-width: 100%;
        max-height: 200px;
        margin: 10px auto;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    /* 文件详情样式 */
    .file-details p {
        margin: 5px 0;
    }

    .file-details strong {
        font-weight: bold;
    }
</style>
