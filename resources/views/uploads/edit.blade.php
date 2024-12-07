<div class="wrapper">
    <div class="card">
        <!-- 修改上传文件的表单 -->
        <form method="POST" action="{{ url("/uploads/$id") }}" enctype="multipart/form-data" class="upload-form">
            @csrf
            @method('put')
            <h3 class="form-title">Update Your Upload</h3>
            <input type="file" name="upload" class="file-input">
            <button type="submit" class="btn update-btn">Change Upload</button>
        </form>

        <!-- 上传后显示的文件信息 -->
        @if (!empty($id))
            <div class="upload-info">
                <h4>Uploaded File</h4>
                <a href="{{ url('/uploads', [$id, $originalName]) }}" class="file-link">
                    {{ $id }} - {{ $originalName }}
                </a>

                @if (substr($mimeType, 0, 5) == 'image')
                    <img src="{{ url('/uploads', [$id, $originalName]) }}" alt="Uploaded Image" class="preview-image">
                @endif
            </div>
        @endif

        <!-- 其他文件信息 -->
        @isset($id)
            <div class="file-details">
                <h4>File Details</h4>
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


<style>
    /* 全局设置 */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .wrapper {
        width: 100%;
        max-width: 650px;
        padding: 20px;
        box-sizing: border-box;
    }

    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        padding: 20px;
        text-align: center;
    }

    /* 表单样式 */
    .upload-form {
        margin-bottom: 40px;
    }

    .form-title {
        font-size: 18px;
        color: #555;
        margin-bottom: 10px;
    }

    .file-input {
        width: 100%;
        padding: 30px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
    }

    .file-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        font-size: 14px;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
        width: 100%;
    }

    .update-btn {
        background-color: #007bff;
    }

    .update-btn:hover {
        background-color: #0056b3;
    }

    .back-btn {
        background-color: #6c757d;
    }

    .back-btn:hover {
        background-color: #5a6268;
    }

    /* 上传信息样式 */
    .upload-info {
        margin-top: 20px;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 10px;
        border-radius: 6px;
    }

    .file-link {
        display: inline-block;
        color: #007bff;
        font-weight: bold;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .file-link:hover {
        text-decoration: underline;
    }

    .preview-image {
        display: block;
        max-width: 100%;
        height: auto;
        margin: 10px auto;
        border-radius: 6px;
    }

    /* 文件详情样式 */
    .file-details h4 {
        margin-bottom: 10px;
        font-size: 16px;
        color: #444;
    }

    .file-details p {
        margin: 5px 0;
        font-size: 14px;
    }

    .file-details strong {
        color: #555;
    }
</style><!-- 样式部分 -->
