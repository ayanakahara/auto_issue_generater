<?php
/**
 * Create an Issue for GitHub
 */

//------------------------------------------------------
// 準備
//------------------------------------------------------
require('./create-config.php');
require('./issue_template.php');

// 定数定義
define('GITHUB_USER',  $set_up['GITHUB_USER']);
define('GITHUB_PW',    $set_up['GITHUB_PW']);
define('GITHUB_OWNER', $set_up['GITHUB_OWNER']);
define('GITHUB_REPOS', $set_up['GITHUB_REPOS']);

// ライブラリ読み込み
require_once('github-php-client/client/GitHubClient.php');

// //------------------------------------------------------
// // Issueを追加
// //------------------------------------------------------
$client = new GitHubClient();
$client->setCredentials(GITHUB_USER, GITHUB_PW);

// //投稿する
try{
  $client->issues->createAnIssue(
      GITHUB_OWNER
    , GITHUB_REPOS
    , $title
    , $body
    , $assignees
    , null
    , $labels
  );
}
catch( GitHubClientException $e ){
  echo $e->getMessage();
}
