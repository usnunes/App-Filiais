unit Unit1;

interface

uses
  System.SysUtils, System.Types, System.UITypes, System.Classes, System.Variants,
  FMX.Types, FMX.Controls, FMX.Forms, FMX.Graphics, FMX.Dialogs,
  FMX.ListView.Types, FMX.ListView.Appearances,
  FMX.ListView.Adapters.Base, FMX.ListView,
  FMX.StdCtrls, FMX.Controls.Presentation, FMX.TabControl, FMX.Edit;

type
  TForm1 = class(TForm)
    ListView1: TListView;
    ToolBar1: TToolBar;
    SpeedButton1: TSpeedButton;
    TabControl1: TTabControl;
    Login: TTabItem;
    Lista: TTabItem;
    Filial: TTabItem;
    Label1: TLabel;
    Edit1: TEdit;
    Edit2: TEdit;
    Label2: TLabel;
    Label3: TLabel;
    Label4: TLabel;
    Button1: TButton;
    Button2: TButton;
    procedure FormShow(Sender: TObject);
    procedure ListView1ItemClick(const Sender: TObject;
      const AItem: TListViewItem);
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);

  private
    { Private declarations }
    procedure carregarLista;
  public
    { Public declarations }
  end;

var
  Form1: TForm1;
  auth: boolean = false;
  token: string = '';

implementation

{$R *.fmx}

uses uDM, System.JSON, System.JSON.Writers, System.JSON.Types,
  REST.Types, REST.Utils, System.JSON.Readers, REST.Json, REST.Client;

procedure AddFilial(id:integer;nome:string;cidade:string; cnpj: string);
var
  item:TListViewItem;
  txt:TListItemText;
begin
  with Form1 do
  begin
    item := ListView1.Items.Add;
    Item.TagString := id.ToString;
    with item do
    begin
      txt := TListItemText(Objects.FindDrawable('Text1'));
      txt.Text :=  nome;


    end;
  end;
end;

procedure TForm1.Button1Click(Sender: TObject);
var
    req: TRESTRequest;
    objLogin: TJSONObject;
begin
  req := TRESTRequest.Create(nil);
  try
      DM.RESTClient1.BaseURL := BASE_URL;
      req.Client := DM.RESTClient1;
      req.ResetToDefaults;
      req.Resource := '/auth/login?email='+Edit1.Text+'&password='+Edit2.text;
      req.Method := rmPOST;
      req.Execute;
      objLogin := req.Response.JSONValue as TJSONObject;
      auth := objLogin.GetValue('success').Value.ToBoolean;
      if(auth = true) then
      begin
        token := objLogin.GetValue('access_token').Value;
        carregarLista;
        TabControl1.ActiveTab := Lista;
      end;
  finally
      req.Free;
  end;
end;

procedure TForm1.Button2Click(Sender: TObject);
begin
  form1.Close;
end;

procedure TForm1.carregarLista;
var
    req: TRESTRequest;
    arrFilial: TJSONArray;
    objFilial: TJSONObject;
    i:integer;
begin
  req := TRESTRequest.Create(nil);
  try
      DM.RESTClient1.BaseURL := BASE_URL;
      req.Client := DM.RESTClient1;
      req.ResetToDefaults;
      req.Resource := '/filiais';
      req.Method := rmGET;
      req.Execute;
      ListView1.Items.Clear;
      arrFilial := req.Response.JSONValue as TJSONArray;
      for I := 0 to arrFilial.Count - 1 do
      begin
          objFilial := arrFilial.Items[i] as TJSONObject;
          AddFilial(objFilial.GetValue('id').Value.ToInteger,
                  objFilial.GetValue('nome').Value,
                  objFilial.GetValue('cidade').Value,
                  objFilial.GetValue('cnpj').Value);
      end;
  finally
      req.Free;
  end;
end;

procedure TForm1.FormShow(Sender: TObject);
begin
  carregarLista;
  TabControl1.ActiveTab := Login;
end;

procedure TForm1.ListView1ItemClick(const Sender: TObject;
  const AItem: TListViewItem);
begin
  //ShowMessage(Aitem.tagstring);
end;

end.