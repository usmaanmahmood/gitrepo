#!/usr/bin/perl
use strict;
use Socket;

  my $serverHost = 'carousel';
  my $serverPort = 4000;
  my $helloToken = "LKJHGFDSA\n";
  my $serverUser = `echo \$USER`;
  my $serverAuthentication = `cat \$HOME/.ARCADE/serverAuthentication`;

$serverUser="mahmoou1\n";
$serverAuthentication="LQKUGRIRDE\n";


sub setUpConnection
{
  local *SOCK;
  my $iaddr   = inet_aton($serverHost) || die "no host: $serverHost";
  my $paddr   = sockaddr_in($serverPort, $iaddr);
  my $proto   = getprotobyname('tcp');
  socket(SOCK, PF_INET, SOCK_STREAM, $proto)  || die "socket: $!";
  connect(SOCK, $paddr) || die "connect: $!";
  print SOCK $helloToken;
  print SOCK $serverUser;
  print SOCK $serverAuthentication;
  return *SOCK;
} # setUpConnection


sub runQuery
{
  local *SOCK = setUpConnection();
  my ($command, $databases, $groups, $students, $courses) = @_;

  print SOCK "$command\n";
  print SOCK "$databases\n";
  print SOCK "$groups\n";
  print SOCK "$students\n";
  print SOCK "$courses\n";
  my $OldSelect = select SOCK; $|=1; select $OldSelect;
  my $result = "";
  my $line;
  while (defined($line = <SOCK>))
  {
    if ($line ne "++WORKING\n")
      { $result .= $line; }
  }
  close (SOCK) || die "close: $!";
  return $result;
} # runQuery


sub getProfile
{
  runQuery("profile", "", "", "", "");
} # getProfile


my $results;

$results = getProfile;
print $results;

print "\n\n------****------\n\n\n";


$results = runQuery("marks-table: all", "11-12-1", "", "", "162L 181L");
print $results;
