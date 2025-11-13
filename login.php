<!-- 상단 헤더 연결 -->
<?php
  include('./sub/header.php');
?>

<main>
  <form action="./php/login_check.php" name="로그인" method="post">
  <!-- 아이디 패스워드 체크하는 걸 resiger라고 한다 -->
  <fieldset>
    <legend>로그인</legend>
    <p>
      <label for="mb_id"></label>
      <input type="text" placeholder="아이디" id="mb_id" name="mb_id">
    </p>
    <p>
      <label for="pw_txt"></label>
      <input type="password" placeholder="비밀번호" id="pw_txt" name="pw_txt">
    </p>
    <p class="save">
    <input type="checkbox" id="id_check">
      <label for="id_check">아이디 저장</label>
    </p>
    <p>
      <input type="submit" value="로그인" id="login_btn">
    </p>
    <p class="more">
      <a href="#" title="아이디 찾기">아이디 찾기</a>
      <a href="#" title="비밀번호 찾기">비밀번호 찾기</a>
      <a href="./php/register.php" title="회원가입 찾기">회원가입 찾기</a>
    </p>
  </fieldset>
  </form>
</main>

<!-- 하단 푸터연결 -->
<?php
  include('./sub/footer.php');
?>
  <!-- 제이쿼리 cdn -->
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <!-- 제이쿼리 쿠키 -->
  <script src="./script/jquery.cookie.js"></script>
  <script>
    $(document).ready(function(){
      //1 .쿠키이름 저장 (임의 지정)
      let key = getCookie('idChk');
      
      //2. 만약에 브라우저에 key 변수에 값이 저장되어 있다면
      if(key){
        $('#mb_id').val(key);//id가 id 박스 안에
        $('#id_check').prop('checked', true); //체크박스에 체크가 되어 있음
        //(아이디 값 표시)
      }

      // 3. 체크박스를 체크하지 않고 다시 체크를 풀 경우(쿠키 저장하지 않겠다 / 삭제)
      $('#id_check').change(function(){
        if($(this).is(':checked')){//is 메서드는 체크여부를 true/ false로 알려줌
          // 쿠키생성하기
          $.cookie('idChk',$('#mb_id').val(),{expires:7, path:'/'});
        }else{//체크를 하지 않음
          //쿠키 생성하지 않음 또는 기존 쿠키 삭제
          $.removeCookie('idChk',{path:'/'});
        }
      });

      // 4. 아이디 입력시 쿠키 생성
      $('#mb_id').keyup(function(){
                if($('#id_check').is(':checked')){//is 메서드는 체크여부를 true/ false로 알려줌
          // 쿠키생성하기
          $.cookie('idChk',$(this).val(),{expires:7, path:'/'});
        }
      });




      $('#id_txt').keyup(function(){//아이디 입력창에 키를 눌렀을 경우 쿠키 갱신
        if($('#id_check').is(':checked')){//체크박스에 체크가 된 경우라면
          setCookie('idChk', $('#id_txt').val(),7); //쿠키를 생성한다.
        }

      })
    });
  </script>