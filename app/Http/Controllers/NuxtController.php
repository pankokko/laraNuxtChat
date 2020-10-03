<?php
//
//    namespace App\Http\Controllers;
//
//    use Illuminate\Http\Request;
//
//
//    class NuxtController extends Controller
//    {
//        public function nuxt(Request $request)
//        {
//            $content = null;
//
//            // Dispatch
//            $dispatch = null;
//            if (\Config::get('nuxt.debug') || \Config::get('nuxt.mode') == "ssr" || \Config::get('nuxt.mode') == "universal") {
//                $dispatch = \Config::get('nuxt.url'). \Config::get('nuxt.base');
//            } else {
//                $dispatch = \Config::get('nuxt.dir'). "/dist/";
//            }
//
//            // Path
//            $path = $request->path;
//            if ($path!=null) {
//                $dispatch = rtrim($dispatch, "/");
//                $dispatch .= "/${path}";
//            };
//
//            // Parameters
//            $method = $request->method();
//            $params = $request->all();
//            $data = http_build_query($params, "", "&");
//
//            // Load Content
//            //dispatch = スキーム + ホスト
//            try {
//                if (preg_match("/^https?:\/\//", $dispatch)) {
//                    $content = $this->redirect($method, $dispatch, $data);
//                } else {
//                    $dispatch = rtrim($dispatch, "/");
//                    if (\File::isDirectory($dispatch)) {
//                        $dispatch .= "/index.html";
//                    } else {
//                        $dispatch = $this->vuefile($dispatch);
//                    }
//                    $content = \File::get($dispatch);
//                }
//            } catch (\Exception $ex) {
//                $content = $ex->getMessage();
//            }
//            // Mime Type
//            $mime_type = $this->MimeType($dispatch);
//            if (is_null($mime_type)) $mime_type = "text/html";
//            return response($content)->header('Content-Type', $mime_type);
//        }
//
//
//        private function redirect($method, $url, $data)
//        {
//            $content = null;
//
//            $language = request()->header('Accept-language');
//            $cookie = request()->header('Cookie');
//
//            $curl = curl_init();
//
//            if ($method == "POST") {
//                curl_setopt($curl, CURLOPT_URL, $url);
//                curl_setopt($curl, CURLOPT_POST, true);
//                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//            } else {
//                curl_setopt($curl, CURLOPT_URL, $url."?${data}");
//                curl_setopt($curl, CURLOPT_HTTPGET, true);
//            }
//            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
//
//            $content = curl_exec($curl);
//            curl_close($curl);
//
//            return $content;
//        }
//
//        private function vuefile($filename)
//        {
//            $vuefile = $filename;
//
//            $pinfo = pathinfo($filename);
//            $ext = array_key_exists("extension", $pinfo) ? strtolower($pinfo['extension']) : null;
//
//            if (is_null($ext)) {
//                $base_name = $pinfo['basename'];
//                $index_file = preg_replace("/${base_name}$/", "index.html", $vuefile);
//                if (\File::isFile($index_file)) {
//                    $vuefile = $index_file;
//                } else {
//                    $upper_dir = preg_replace("/\/${base_name}$/", "", $vuefile);
//                    $root_dir = \Config::get('nuxt.dir'). "/dist";
//                    if (strlen($root_dir) <= strlen($upper_dir)) {
//                        $vuefile = $this->vuefile($upper_dir);
//                    }
//                }
//            }
//
//            return $vuefile;
//        }
//
//        private function MimeType($filename)
//        {
//            $mime = null;
//
//            $mime_types = array(
//                // text, HTML
//                "txt" => "text/plain",
//                "htm" => "text/html",
//                "html" => "text/html",
//                "xhtml" => "application/xhtml+xml",
//                "csv" => "text/csv",
//                "xml" => "application/xml",
//                "rss" => "application/rss+xml",
//                "json" => "application/json",
//                "jsonld" => "application/ld+json",
//                // CSS, Script
//                "css" => "text/css",
//                "js" => "application/javascript",
//                "vbs" => "text/vbscript",
//                "php" => "text/html",
//                "cgi" => "application/x-httpd-cgi",
//                // Image
//                "png" => "image/png",
//                "jpe" => "image/jpeg",
//                "jpeg" => "image/jpeg",
//                "jpg" => "image/jpeg",
//                "gif" => "image/gif",
//                "bmp" => "image/bmp",
//                "ico" => "image/vnd.microsoft.icon",
//                "tiff" => "image/tiff",
//                "tif" => "image/tiff",
//                "svg" => "image/svg+xml",
//                "svgz" => "image/svg+xml",
//                // Archive
//                "zip" => "application/zip",
//                "rar" => "application/x-rar-compressed",
//                "exe" => "application/x-msdownload",
//                "msi" => "application/x-msdownload",
//                "cab" => "application/vnd.ms-cab-compressed",
//                "gz" => "	application/gzi",
//                "bz" => "application/x-bzi",
//                "bz" => "application/x-bzip2",
//                // Audio, Movie
//                "mp3" => "audio/mpeg",
//                "m4a" => "audio/acc",
//                "mpg" => "video/mpeg",
//                "mpeg" => "video/mpeg",
//                "mp4" => "video/mp4",
//                "webm" => "video/webm",
//                "ogg" => "video/ogg",
//                "qt" => "video/quicktime",
//                "mov" => "video/quicktime",
//                "wav" => "audio/wav",
//                "ra" => "audio/vnd.rn-realaudio",
//                "mid" => "audio/midi",
//                "midi" => "audio/vnd.rn-realaudio",
//                "avi" => "video/x-msvideo",
//                "swf" => "application/x-shockwave-flash",
//                "flv" => "video/x-flv",
//                // Adobe
//                "pdf" => "application/pdf",
//                "psd" => "image/vnd.adobe.photoshop",
//                "ai" => "application/postscript",
//                "eps" => "application/postscript",
//                "ps" => "application/postscript",
//                // MS Office
//                "doc" => "application/msword",
//                "rtf" => "application/rtf",
//                "xls" => "application/vnd.ms-excel",
//                "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
//                "ppt" => "application/vnd.ms-powerpoint",
//            );
//
//            // extension --> MIME
//            $pinfo = pathinfo($filename);
//            $ext = array_key_exists("extension", $pinfo) ? strtolower($pinfo['extension']) : null;
//            if (!empty($ext)) {
//                if (array_key_exists($ext, $mime_types)) {
//                    $mime = $mime_types[$ext];
//                } else if (!preg_match("/^https?:\/\//", $filename)) {
//                    $finfo = new finfo(FILEINFO_MIME_TYPE);
//                    $mime = $finfo->file($filename);
//                } else {
//                    $mime = "application/octet-stream";
//                }
//            }
//
//            return $mime;
//        }
//
//    }
