'''
Created on 2023年10月25日

@author: bond9
'''
import pandas as pd

dtypes = {
    }

df = pd.read_csv(r'C:\Users\bond9\OneDrive\桌面\drive-download-20231025T022029Z-001\edu_bigdata_imp1.csv', encoding='big5', dtype=dtypes)
#1.1
df_filtered = df[df['PseudoID'] == 39] # PseudoID = 39 的資料

unique_values1_1 = df_filtered['dp001_review_sn'].unique() # PseudoID = 39 學生在dp001觀看過之影片的編號(不重複)
print('1.1 39號學生於 dp001 平臺總共進行幾次不重複的影片瀏覽的學習紀錄?')
print(len(unique_values1_1))
print()

#1.2
unique_values1_2 = df_filtered['dp001_question_sn'].dropna().unique() # PseudoID = 39 學生在dp001作答過之檢核點的編號(不重複)
print('1.2 39號學生於 dp001 平臺瀏覽影片時，總共進行幾次不重複的檢核點作答?')
print(len(unique_values1_2))
print()

#2.1
df_filtered2 = df[df['PseudoID'] == 281] # PseudoID = 281 的資料

unique_values2_1 = df_filtered2['dp001_indicator'].unique() # PseudoID = 281 學生看過的不同能力指標的影片的能力指標(不重複)
ans = df_filtered2[df_filtered2['dp001_indicator'].isin(unique_values2_1)][['dp001_video_item_sn', 'dp001_indicator']]
# 根據不重複的能力指標找出[影片編號, 能力指標]的dataframe
ans_unique = ans.drop_duplicates(subset=['dp001_video_item_sn', 'dp001_indicator'])
# 去掉重複的資料
result = ans_unique[['dp001_video_item_sn', 'dp001_indicator']].astype({'dp001_video_item_sn': int}).values.tolist()
# 轉換輸出格式
print('2.1 281號學生於 dp001 平臺總共瀏覽過哪些不重複的影片且對應的能力指標為何?')
print(result)
print()

#2.2
print('2.2 281號學生於 dp001 平臺共有幾次的練習題作答紀錄正確率是 100?')
print(len(df_filtered2[df_filtered2['dp001_prac_score_rate'] == 100]['dp001_prac_score_rate']))
print()

#3.1
# 71號學生的行為紀錄
student_71_actions = df[df['PseudoID'] == 71]

# 3.1 於 dp001 平臺的瀏覽影片時，操作行為名稱為「暫停」總共有幾次?
pause_count = student_71_actions[student_71_actions['dp001_record_plus_view_action'] == 'paused'].shape[0]

print(f"3.1 71號學生總共暫停影片的次數為: {pause_count} 次", end="\n\n")

# 3.2 分別於哪幾天進入 dp001 平臺?
enter_days = set(student_71_actions['dp001_prac_date'].dropna())

print("3.2 71號學生分別於以下天數進入 dp001 平臺:")
for day in enter_days:
    print(day)
print()

# 4.1 請找出在 dp001 平臺 中，最多影片瀏覽行為的影片序號
most_viewed_video = df[df['dp001_review_sn'].notna()]['dp001_video_item_sn'].mode().values[0]

print(f"4.1 在 dp001 平臺中，最多影片瀏覽行為的影片序號為: {most_viewed_video}", end="\n\n")

# 4.2 請找出在 dp002 平臺中，操作資源的知識架構分類中為「十二年國民基本教育類」總共有幾筆?
knowledge_category_count = df[df['dp002_extensions_alignment'] == '十二年國民基本教育類'].shape[0]

print(f"4.2 在 dp002 平臺中，操作資源的知識架構分類中為「十二年國民基本教育類」總共有 {knowledge_category_count} 筆", end="\n\n")

# 4.3 請找出在 dp002 平臺中，前 3 個最常發生的操作行為名稱
top_3_actions = df[df['dp002_verb_display_zh_TW'].notna()]['dp002_verb_display_zh_TW'].value_counts().head(3)

print("4.3 在 dp002 平臺中，前 3 個最常發生的操作行為名稱:", end="\n\n")
print(top_3_actions)

# 4.4 請找出在 dp002 平臺中，操作資源的知識架構分類中為「校園職業安全」總共有幾筆?
campus_safety_count = df[df['dp002_extensions_alignment'] == '校園職業安全'].shape[0]

print(f"4.4 在 dp002 平臺中，操作資源的知識架構分類中為「校園職業安全」總共有 {campus_safety_count} 筆", end="\n\n")