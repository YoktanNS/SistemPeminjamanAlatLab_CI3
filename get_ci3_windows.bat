@echo off
REM Script to download CodeIgniter 3.1.11 and set up 'system' folder for the project.
REM Requires PowerShell (installed on modern Windows).
echo Downloading CodeIgniter 3.1.11 from GitHub...
powershell -Command ^
  "$url = 'https://codeload.github.com/bcit-ci/CodeIgniter/zip/refs/tags/3.1.11'; ^
   $out = 'codeigniter-3.1.11.zip'; ^
   Invoke-WebRequest -Uri $url -OutFile $out; ^
   Expand-Archive -LiteralPath $out -DestinationPath . -Force; ^
   Move-Item -Force 'CodeIgniter-3.1.11/system' 'system'; ^
   Move-Item -Force 'CodeIgniter-3.1.11/index.php' 'index.php'; ^
   Remove-Item -Recurse -Force 'CodeIgniter-3.1.11'; ^
   Remove-Item -Force $out; ^
   echo Done. You can now open http://localhost/studikasus1/index.php/peminjaman or without index.php after .htaccess setup." || ^
  (echo PowerShell failed. Please download CodeIgniter 3.1.11 manually from https://codeigniter.com and copy the 'system' folder and index.php into the project root.)
pause
