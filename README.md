# 학생문화공간위원회 홈페이지

**학생문화공간위원회 홈페이지**는 **카이스트 학생회관**의 **예약** 처리, 게시물 부착 신고, 문의, 공지, 분실물 처리, 위원회 및 학생회관 소개를 위해 만들어졌다 ​:+1:​

​이후 예약된 행사의 **광고**를 홈페이지 전면에 배치하거나, 다른 교내 페이지에 배너를 달 수 있도록 **API를 제공** :heart_eyes: 하는 등 카이스트 학생문화의 창달을 위한 서비스를 제공할 **계획**이다

## 설치

이 서비스를 설치하는 과정은 아래와 같다

1. [우분투](https://www.ubuntu.com) 16.04.1 을 설치한다. 적어도 2020년에는 Ubuntu 18.04 LTS 등의 운영체제로 이전을 권한다

2. [Apache 서버](https://httpd.apache.org), [PHP](http://php.net), [MySQL](https://www.mysql.com) 를 설치한다. 다른 환경은 테스트해보지 않았으나 성능:sparkling_heart:의 이유로 [Nginx 서버](https://www.nginx.com), 라이센스의 이유:cry:로 [MariaDB](https://mariadb.org) 로의 이전을 권한다

   ```bash
   # Apache 서버 설치
   sudo apt-get install apache2

   # MySQL 설치, root 사용자의 비밀번호를 입력해야 할 수 있다
   sudo apt-get install mysql-server mysql-client

   # PHP 설치, php-soap 는 KAIST 에서 제공하는 단일 인증 서비스와 통신하기 위해 필요하다
   sudo apt-get install php libapache2-mod-php php-xml php-gd php-mysql php-soap

   # Apache와 MySQL을 업데이트하라
   sudo service apache2 restart
   sudo service mysql restart
   ```

   설치가 잘 되었는지 확인하기 위해서는 netstat 명령어를 이용하라

   ```bash
   netstat -nlp
   ```

3. 웹 루트 폴더에 이 프로젝트를 git clone 한다. 우분투 아파치의 기본 웹 루트 폴더는 /var/www/html이다

4. (Apache의 경우) [.htaccess 파일을 수정하여](https://codeigniter.com/user_guide/general/urls.html#removing-the-index-php-file) 거슬리는 index.php를 제거한다. 이 때, /etc/apache2/apache.conf 에서 Document Root 의 AllowOverride 값을 수정해야할 수 있다

5. *web-root*/application/config/config.php 의 base_url 을 환경의 url 로 변경한다

6. *web-root*/application/config/ga-key.template.php 를 ga-key.php 로 복사하여 ga_key를 Google Analytics 토큰에 맞게 설정하라

7. *web-root*/application/config/iam-key.template.php 를 iam-key.php 로 복사하여 iam_key 를 카이스트 IT개발팀으로부터 단일 인증 서비스 사용 신청하여 획득한 토큰으로 수정하라. 이 단계가 진행되지 않으면, 로그인을 할 수 없다

8. *web-root*/application/config/database.template.php 를 database.php 로 복사하여 database 관련 설정을 입력하라. 이 단계가 진행되지 않으면, 서비스가 작동하지 않는다

9. 웹 브라우저로 제대로 작동하는지 확인하고, 이상이 있다면 이전 개발자에게 문의한다

## 개발

이 서비스의 개발에 활용된 도구는 아래와 같다

- [Atom](https://atom.io) (마지막 커밋 이후 수정된 파일을 하이라이트해 주는 가볍고 git 친화적인 에디터)
  - [sftp-deployment package](https://atom.io/packages/sftp-deployment) (로컬 환경에서 저장될 때 원격 서버에도 SFTP 로 저장한다. 로컬 삭제를 원격에 반영하지 않기 때문에 주의가 필요하다)
  - [emmet package](https://atom.io/packages/emmet) (탭 키로 HTML 태그를 자동완성 해준다. [다양한 기능](http://emmet.io)을 제공하므로 직접 배우길 권한다)
- [SourceTree](https://www.sourcetreeapp.com) (git GUI client. 어느정도 git에 익숙해지고 난다면, 커맨드라인으로 고급 기능을 익히길 기대한다. git 학습에는 [git-it](https://github.com/jlord/git-it-electron), [pro git](https://git-scm.com/book/ko/v2) 을 추천한다. 둘 다 한국어로 훌륭히 번역되어 있으며, git-it 은 좀 더 인터렉티브하지만 깊이가 얕고, pro git 은 길지만 깊다.)
- [Github](https://github.com) ([Github Education Pack](https://education.github.com/pack) 으로 비공개 저장소를 만들었다.)
- Photoshop, Illustrator
- [Filezilla](https://filezilla-project.org)
- vim, 이 도구는 대부분의 리눅스 배포판과 모든 macOS 에 이미 깔려있다

​상기의 도구는 필수적이지 않으나, 1) [코드를 테스트할 수 있는 환경](https://scspacedev.kaist.ac.kr), 2) [실제 서버](https://scspace.kaist.ac.kr), 3) [버전 관리 서버](https://github.com)를 둘 것을 권한다. 각 환경은 반드시 [보안연결](https://en.wikipedia.org/wiki/Transport_Layer_Security)하라. 코드를 백업하는 서버에는 키:key: 파일을 저장하지 않는다. 이는 [.gitignore 파일](https://git-scm.com/docs/gitignore)으로 쉽게 설정할 수 있다

사용한 기술 스택은 아래와 같다

- [CodeIgniter 3.0.6](https://codeigniter.com)
- [Bootstrap 3.3.6](http://getbootstrap.com)
  - Bootstrap 에 포함된 [jQuery](https://jquery.com) 와 [glyphicon](http://glyphicons.com) 도 사용했다
- [AngularJS 1.5.8](https://angularjs.org)
  - 책다방 책 목록, 예약 처리 페이지 등에 부분적으로 사용되었다

## 서비스

이 서비스는 개인정보를 이용하기 때문에 반드시 HTTPS 를 비롯한 보안 연결로 서비스 돼야 한다. 이를 위해 [CertBot](https://certbot.eff.org) 을 사용하길 권한다

​이 서비스는 [카이스트 IT개발팀](tel:+82-42-350-5283) 에서 제공하는 [SOAP](https://en.wikipedia.org/wiki/SOAP) API 로 개인정보를 취득, 관리하고 있다. 이에 대한 Specification 은 **단일 인증 서비스 V3.0 적용 가이드**라는 문서에서 소개하고 있다. ~~이 서비스는 암호키와 서비스 사용자 (이 프로젝트의 경우 서버 관리자) 의 카이스트 IAM 계정을 요구한다. (이는 불필요한 정보가 서버에 저장되어 잘못된 보안이다.:rage: 서비스별로 토큰을 발급하는 것이 더 안전하다.)~~ v3.0.1 버전부터 필요없게 되었다 :+1:

## 기여

이 프로젝트에 기여하고자 한다면, 먼저 [프로젝트 위키](https://github.com/scspace/scspace/wiki)를 방문하길 추천한다

이 프로젝트는 [4기 김유진](https://github.com/YujinGaya)이 시작했으며, 4대 위원장 권동현이 디자인에, 3대 위원장 이현주가 기획에, 3기 조현근이 개발에 참여했다. 인물은 ㄱㄴㄷ순 정렬이다 ​:smiley:​

## 판권과 라이센스

이 프로젝트의 판권은 학생문화공간위원회에 있으며, 학생문화공간위원회가 허가하지 않은 복제, 배포, 수정을 금지한다
