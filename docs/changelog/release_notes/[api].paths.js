import { loadEnv } from 'vitepress';

export default {
    /**
     *
     * @returns
     */
    async items() {
        const env = loadEnv('', process.cwd(), "");
        const data = await (await fetch(`${env.API_MONITOR_URL}/api/sources`)).json();
        
        const items = new Map;
        data.result.items.forEach(item => {
            if (!items.has(item.category)) {
                let title = '';
                if (item.category === 'buy') {
                    title = 'Buying APIs'
                } else if (item.category === 'developer') {
                    title = 'Developer APIs'
                } else if (item.category === 'sell') {
                    title = 'Selling APIs'
                }
                items.set(item.category, {
                    text: title,
                    items: [],
                    collapsed: true
                });
            }
            items.get(item.category).items.push({
                text: item.title,
                link: `/changelog/release_notes/${item.category}-${item.slug}`
            })
        });

        return [...items.values()];
    },

    /**
     *
     * @returns
     */
    async paths() {
        const env = loadEnv('', process.cwd(), "");
        const data = await (await fetch(`${env.API_MONITOR_URL}/api/release_notes`)).json();

        return data.result.items.map(item => ({
            params: {
                api: item.category + '-' + item.slug,
                title: item.title + ' Release Notes',
                url: item.changelog_url
            },
            content: item.release_notes.map(
                note => `## ${note.version}\n\n${note.content_markdown}`
            ).join('\n\n')
        }));
    }
}
